<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cek Kesehatan Mental|HEAL</title>
    <link rel="stylesheet" href="{{ asset('css/cek-kesehatan-mental.css') }}" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="{{ asset('js/cek-kesehatan-mental.js') }}"></script>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        @if (session('error'))
            alert("{{ session('error') }}");
        @endif
    });
  </script>
  </head>
  <body>
    <audio id="alertMusic" src="aset/_Laskar Pelangi_ _ TRUST (Trinity Youth Symphony Orchestra) (1).mp3" loop></audio>

    <div id="alertBox" class="alert-box">
      <h2 class="alert-h2">Petunjuk Pengisian</h2>
      <div class="alert-content">
        <div class="alert-icon">
          <i class="fa-solid fa-camera"></i></div>
        <div class="alert-p">
          <p>Izinkan akses kamera</p>
        </div>
      </div>
      <div class="alert-content">
        <div class="alert-icon">
          <i class="fa-solid fa-list-check"></i></div>
        <div class="alert-p">
          <p>Isilah Pertanyaan sesuai dengan keadaan</p>
        </div>
      </div>
      <div class="alert-content">
        <div class="alert-icon">
          <i class="fa-solid fa-check"></i></div>
        <div class="alert-p">
      <p>Hanya terdapat 4 pilihan, pilih yang sangat tepat menurutmu</p>
        </div>
      </div>
      <button id="startButton" class="btn-mulai" disabled>Mulai</button>
    </div>
    <div class="overlay"></div>

    <div id="formContainer" class="hidden">
      <h1>Kuesioner Kesehatan Mental</h1>
      <div class="form-card">
        <form id="quizForm" action="{{ route('cek-kesehatan-mental.submit') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="session_id" value="{{ session()->getId() }}">
          <div class="question" id="question1">
            <label for="q1" class="question-label"
              >1. Saya selalu menyalahkan diri sendiri dan merasa telah mengecewakan orang
              lain</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q1" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q1" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q1" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q1" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question2">
            <label for="q2" class="question-label"
              >2. Saya mengkritik diri saya untuk semua kesalahan saya</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q2" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q2" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q2" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q2" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question3">
            <label for="q3" class="question-label"
              >3. Saya mendengar suara-suara tuduhan atau kutukan dan mengalami
              halusinasi</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q3" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q3" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q3" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q3" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question4">
            <label for="q4" class="question-label"
              >4. Saya sering sakit dan merasa itu adalah hukuman atas perbuatan yang saya
              lakukan di masa lalu</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q4" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q4" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q4" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q4" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question5">
            <label for="q5" class="question-label"
              >5. Saya kehilangan kepercayaan terhadap diri sendiri</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q5" value="0" onchange="takePhoto(1)" />Sangat
                jarang/Tidak pernah
              </label>
              <label>
                <input
                  type="radio"
                  name="q5"
                  value="1"
                  onchange="takePhoto(1)"
                />Kadang-kadang
              </label>
              <label>
                <input type="radio" name="q5" value="2" onchange="takePhoto(1)" />Cukup
                sering
              </label>
              <label>
                <input
                  type="radio"
                  name="q5"
                  value="3"
                  onchange="takePhoto(1)"
                />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question6">
            <label for="q6" class="question-label"
              >6. Saya sering mengeluh sulit tidur</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q6" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q6" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q6" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q6" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question7">
            <label for="q7" class="question-label"
              >7. Saya sering mengeluh gelisah dan terganggu tiap malam</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q7" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q7" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q7" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q7" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question8">
            <label for="q8" class="question-label"
              >8. Saya sering terjaga tiap malam</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q8" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q8" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q8" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q8" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question9">
            <label for="q9" class="question-label"
              >9. Bila telah bangun/bangkit, saya tidak dapat tidur kembali</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q9" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q9" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q9" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q9" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question10">
            <label for="q10" class="question-label"
              >10. Saya sering lelah, lemas dan mengantuk pada siang hari</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q10" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q10" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q10" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q10" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question11">
            <label for="q11" class="question-label"
              >11. Saya mengalami hilang minat dalam melakukan kegiatan atau
              pekerjaan</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q11" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q11" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q11" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q11" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question12">
            <label for="q12" class="question-label"
              >12. Waktu aktual yang dihabiskan untuk melakukan kegiatan atau pekerjaan
              mengalami penurunan serta menurunnya produktivitas</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q12" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q12" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q12" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q12" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question13">
            <label for="q13" class="question-label"
              >13. Saya berhenti bekerja karena sering mengeluh sakit</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q13" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q13" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q13" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q13" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question14">
            <label for="q14" class="question-label"
              >14. Saya tidak mempunyai energi yang cukup untuk melakukan banyak
              hal</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q14" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q14" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q14" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q14" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question15">
            <label for="q15" class="question-label"
              >15. Saya mudah tersinggung dengan perkataan atau perbuatan orang
              lain</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q15" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q15" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q15" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q15" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question16">
            <label for="q16" class="question-label"
              >16. Saya selalu merasa khawatir</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q16" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q16" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q16" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q16" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question17">
            <label for="q17" class="question-label"
              >17. Saya selalu merasa gugup berlebihan ketika melakukan interaksi
              sosial</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q17" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q17" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q17" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q17" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question18">
            <label for="q18" class="question-label"
              >18. Saya selalu merasa ketakutan setiap kali ditanyai sesuatu</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q18" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q18" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q18" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q18" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question19">
            <label for="q19" class="question-label"
              >19. Saya selalu berkeringat dan sering buang air kecil</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q19" value="0" />Sangat jarang/Tidak pernah
              </label>
              <label> <input type="radio" name="q19" value="1" />Kadang-kadang </label>
              <label> <input type="radio" name="q19" value="2" />Cukup sering </label>
              <label>
                <input type="radio" name="q19" value="3" />Sering/Selalu mengalami
              </label>
            </div>
          </div>
          
          <div class="question" id="question20">
            <label for="q20" class="question-label"
              >20. Saya kehilangan nafsu makan tetapi terkadang dapat makan tanpa dorongan
              orang lain</label
            >
            <div class="answer">
              <label>
                <input type="radio" name="q20" value="0" onchange="takePhoto(2)" />Sangat
                jarang/Tidak pernah
              </label>
              <label>
                <input
                  type="radio"
                  name="q20"
                  value="1"
                  onchange="takePhoto(2)"
                />Kadang-kadang
              </label>
              <label>
                <input type="radio" name="q20" value="2" onchange="takePhoto(2)" />Cukup
                sering
              </label>
              <label>
                <input
                  type="radio"
                  name="q20"
                  value="3"
                  onchange="takePhoto(2)"
                />Sering/Selalu mengalami
              </label>
            </div>
          </div>
        
          <div class="question" id="question21">
            <label for="q21" class="question-label">21. Saya harus terus mendapatkan nilai yang baik dalam akademik</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q21" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q21" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question22">
            <label for="q22" class="question-label">22. Persaingan nilai di kelas sangat ketat sehingga saya malu jika mendapat nilai jelek</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q22" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q22" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question23">
            <label for="q23" class="question-label">23. Soal-soal ujian dan tugas terlalu banyak</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q23" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q23" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question24">
            <label for="q24" class="question-label">24. Saya tidak dapat membagi waktu belajar dengan kegiatan lain</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q24" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q24" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question25">
            <label for="q25" class="question-label">25. Saat menuntut ilmu saya diwajibkan membeli banyak buku dan sumber referensi</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q25" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q25" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question26">
            <label for="q26" class="question-label">26. Saya tidak sanggup membayar UKT dan biaya praktikum yang sangat mahal</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q26" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q26" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question27">
            <label for="q27" class="question-label">27. Saya membayar biaya perkuliahan saya secara mandiri tanpa beasiswa</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q27" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q27" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question28">
            <label for="q28" class="question-label">28. Saya lebih suka duduk menyendiri saat di kelas</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q28" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q28" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question29">
            <label for="q29" class="question-label">29. Saya menjadi tulang punggung keluarga karena orang tua tidak mampu bekerja</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q29" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q29" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question30">
            <label for="q30" class="question-label">30. Saya pernah menjadi korban penipuan online</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q30" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q30" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question31">
            <label for="q31" class="question-label">31. Saya pernah terbersit untuk melakukan tindakan kriminal untuk mendapatkan uang</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q31" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q31" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question32">
            <label for="q32" class="question-label">32. Saya mudah curiga terhadap orang lain</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q32" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q32" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question33">
            <label for="q33" class="question-label">33. Saya jarang berinteraksi dengan keluarga dan teman</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q33" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q33" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question34">
            <label for="q34" class="question-label">34. Saya cenderung berdiam diri di dalam kamar</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q34" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q34" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question35">
            <label for="q35" class="question-label"> 35. Saya banyak melamun dengan pikiran yang repetitif</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q35" value="1" onchange="takePhoto(3)" />Ya
                </label>
                <label>
                    <input type="radio" name="q35" value="0" onchange="takePhoto(3)" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question36">
            <label for="q36" class="question-label">36. Saya suka mengisolasi diri saya dari masyarakat</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q36" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q36" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question37">
            <label for="q37" class="question-label">37. Penderita penyakit mental merupakan aib keluarga</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q37" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q37" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question38">
            <label for="q38" class="question-label">38. Penderita penyakit mental merupakan beban masyarakat</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q38" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q38" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question39">
            <label for="q39" class="question-label">39. Fasilitas kesehatan mental dapat menurunkan tingkat gangguan mental health</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q39" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q39" value="0" />Tidak
                </label>
            </div>
          </div>

          <div class="question" id="question40">
            <label for="q40" class="question-label">40. Penderita penyakit mental sudah menjadi bahaj ejekan sejak lama</label>
            <div class="answer">
                <label>
                    <input type="radio" name="q40" value="1" />Ya
                </label>
                <label>
                    <input type="radio" name="q40" value="0" />Tidak
                </label>
            </div>
          </div>

          <input type="file" id="photo1" name="photo1" style="display:none;">
          <input type="file" id="photo2" name="photo2" style="display:none;">
          <input type="file" id="photo3" name="photo3" style="display:none;">


          <button type="submit" class="btn-kirim">Submit</button>
        </form>
    </div>

    {{-- <script src="{{ asset('js/cek-kesehatan-mental.js') }}"></script> --}}

  </body>
</html>
