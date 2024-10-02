from flask import Flask, request, jsonify
import cv2
import numpy as np
import joblib
import os
from skimage.feature import hog

# Inisialisasi Flask app
app = Flask(__name__)

# Load model, scaler, dan PCA dari file
model = joblib.load('models/svm_face_mood_model_best.pkl')
scaler = joblib.load('models/scaler_best.pkl')
pca = joblib.load('models/pca_best.pkl')

# Mapping dari prediksi asli ke label positif/negatif
label_mapping = {
    'happy': 'positif',
    'surprise': 'positif',
    'anger': 'negatif',
    'disgust': 'negatif',
    'fear': 'negatif',
    'sad': 'negatif'
}

# Fungsi untuk mendeteksi wajah
def detect_faces(image):
    face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')
    faces = face_cascade.detectMultiScale(image, scaleFactor=1.1, minNeighbors=5)
    if len(faces) > 0:
        x, y, w, h = faces[0]
        face = image[y:y+h, x:x+w]
        face_resized = cv2.resize(face, (96, 96))
        return face_resized
    return cv2.resize(image, (96, 96))

# Fungsi untuk ekstraksi fitur HOG
def extract_hog_features(image):
    fd = hog(image, orientations=8, pixels_per_cell=(16, 16), cells_per_block=(1, 1), visualize=False)
    return fd

@app.route('/process_photos', methods=['POST'])
def process_photos():
    try:
        # Mendapatkan paths dari request
        photo_paths = request.json['photo_paths']

        results = []
        for path in photo_paths:
            # Baca gambar
            if not os.path.exists(path):
                results.append({'photo': path, 'error': 'File not found'})
                continue

            image = cv2.imread(path, cv2.IMREAD_GRAYSCALE)
            if image is None:
                results.append({'photo': path, 'error': 'Invalid image file'})
                continue

            # Deteksi wajah
            face = detect_faces(image)

            # Ekstraksi fitur HOG
            hog_features = extract_hog_features(face)

            # Standarisasi fitur
            hog_features = hog_features.reshape(1, -1)
            hog_features_scaled = scaler.transform(hog_features)

            # Reduksi dimensi menggunakan PCA
            hog_features_pca = pca.transform(hog_features_scaled)

            # Prediksi menggunakan model
            prediction = model.predict(hog_features_pca)[0]

            # Mapping prediksi ke kelas positif/negatif
            mapped_prediction = label_mapping.get(prediction, 'unknown')

            results.append({'photo': path, 'prediction': mapped_prediction})

        return jsonify(results), 200

    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)
