<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcements = [
            [
                'private'     => false,
                'title'       => 'Bilkent History Graduate Symposium 2022',
                'description' => "
Bilkent History Graduate Symposium 2022

Title: “Bilkent History Graduate Symposium 2022”
Date: 09-10 May 2022, Monday and Tuesday

Time: 09.20 – 17.00

Venue: FEASS, C-Block Amphi

Dear Colleagues and Students,
It is our great pleasure to invite you all to Billkent History Graduate Symposium, which will take place on 9-10 May. Twenty six graduate students from Bilkent University, Bogazici University, Middle East Technical University and Koç University will present their work in eight panel sessions at this two-day event which will be held at C-Block Amphi from 09:20 till 17:00 each day.

Bilkent History Graduate Symposium 2022 Schedule:
May, 9 Monday

h. 9:20 Welcome Address (Prof. Refet Gürkaynak, Dean of FEASS and Director of the Graduate Schools of Economics and Social Sciences)

h. 9:30-11:00- The Ottomans and their Histories (Discussant: Berke Torunoğlu, Bilkent University)
Esra Ansel, Bilkent University - \"An Ottoman Bureaucrat Reinvents Himself as a Tea Trader\"
Saim Anıl Karzek, Bilkent University - \" Donanma-i Hümâyûn and its Role in the Ottoman Modernization During Selim III’s Reign.\"
Furkan Taşpınar, Bilkent University - \"Reflections on the Relations Among the Local Agents in the Ottoman Balkans\"

h. 11:00-11:20- Break

h. 11:20-13:00- Urban Studies between East and the West (Discussant: Luca Zavagno, Bilkent University)
Mustafa Özgür Elmacıoğlu, Bilkent University- \"The Cinque Ports in the First Barons' War.\"
Muhammed Said Dağlı, Bilkent University- “Methodological Issues to Understand the Namazgâh of Ankara in the Classical and Post-Classical Era.”
Feyza Daloğlu, Bilkent University- “Wasif Jawharriyeh and the Identity-forming Spaces of Late Ottoman Jerusalem.”

h. 13:00-14:00- Lunch Break

h. 14:00-15:20- Cultural History (Discussant: Tanfer Emin Tunç, Hacettepe University)?
Özlem Sultan Çolak, Bilkent University- “From Silence to the Remember: Importance of Museums to Rewrite the History.”
Aslınur Memiş, Bilkent University- \"Magical Realism and its Resistance to the Canon of World Literature.\"
Özge Işık, Bogazici University- “Şu’arâ vü Zurefâ Cem’ Olmış İken: Spaces for Literary Gatherings in “Meşairü’ş-Şuarâ”

h. 15:20-15:40- Break

h. 15:40-17:00- Contemporary European History (Discussant: Stefano Boatto, University of Bergamo)
Ece Beyret, Bilkent University- “Puritan Piety as a Justification Tool.”
Bengin Eser Öztürk, Bilkent University- \"Land of Liberty and Light\": 19th-century Western Philhellenism as a Reaction to the Greek Revolution.”
Koray Saçkan, Bilkent University- “The Greek Orthodox Villages of Central Anatolia During the 1923 Population Exchange: Karamanli Destans of Displacement from the Villages of Gelveri and Andaval.”
Yağmur Fakıoğlu, Bilkent University – “How Public Opinion in the United Kingdom Shifted Just in Time to Affirm Accession into the European Communities.”

May, 10 Tuesday

h. 09.30-11:00- Early Modern European History (Discussant: Levent Yılmaz, Bilkent University)
Ege Barış Kanık, Bilkent University- \"The Venetian Scene for Music in the Baroque Era.\"
A. Sıla Önder, Bilkent University- \"Dutch Nobility in the Paintings of the Dutch Golden Age.\"
Onuralp Çakır, Bilkent University- “Astrology and its Status as a Natural Science in the Renaissance”

h. 11:00-11:20- Break

h. 11:20-13:00- Byzantium between Late Antiquity and the Early Middle Ages (Discussant: Pelin Yoncacı, ODTÜ)
Virginia Sommella, Bilkent University - “The Coming of Christianity to North Mesopotamia”
Fermude Gülsevinç, Bilkent University - “The Dance of the Sun and the Rose”: Urban Transformation of Rhodes During Early Middle Ages (6th to 9th Century).”
Dilara Burcu Giritlioğlu, ODTÜ – “An Urban Node in the Ritual Landscape of Byzantine Constantinople: The Church of St. John the Baptist of the Stoudios Monastery.”

h. 13:00-14:00- Lunch Break

h. 14:00-15:20- Gender studies across the Ages (discussants: Berrak Burçak, Bilkent University )
Dilan Doğar, Bilkent University - \"Gender and Magic: Explaining the Feminine Connotations of Magic Through Norse Society in the Late Scandinavian Iron Age.”
Ayşe Nergiz, Bilkent University - \"The Usage of Space and Body in the Legends of Female Martyrs.\"
Eylül Çetinbaş, Bilkent University - \"The Koran-Bride\" and \"an Intercessor of Muhammad\"

h.15:20-15.40- Break

h. 15:40-17:00- Spaces and Frontiers in Anatolian History (Discussant: Owen Miller, Bilkent University)
Selman Oğuzcan Ünal, Bilkent University- \" Spolia in Castles of Ankara and Nicaea: Explaining the Urban Space Through Spatiality and Nostalgia \"
Orçun Sena Saraçoğlu, ODTÜ- “A Historiographical Critique of “Islamic Architecture” The Case of 13th Century Anatolian Seljuks.”
Samuel Stevens, Koç University – “Tevarih-i Futuh-i Şirvan: A Portrait of Ottoman Campaigning on the Safavid Frontier, 1578-1579.”
Concluding Remarks (Mehmet Kalpaklı, Chair, Department of History).",
            ],
            [
                'private'     => false,
                'title'       => 'COVID-19 Raporu / COVID-19 Report',
                'description' => "Bilkent Üniversitesi COVID-19 Raporu (06 Mayıs 2022)

Bilkent Üniversitesi'nde Sağlık Merkezi tarafından takip edilen COVID-19 vakalarının güncel dağılımı şöyledir:

Halen takip edilmekte olan toplam 7 vaka mevcuttur.

Bu vakalardan 4’ü akademik personel, 1’i destek personel,1’i öğrenci, 1’i şirket personelidir. Son bir hafta içinde 4 yeni vaka görülmüş, 10 hastamız ise iyileşmiştir.

Tüm vakalar evde tedavi görmekte olup izolasyon altındadır. Hastaların kampüs içindeki temaslıları Sağlık Merkezi tarafından titizlikle takip edilmektedir.

Tüm COVID hastalarına acil şifalar dileriz.

----------

Bilkent University COVID-19 Report (May 06, 2022)

COVID-19 cases among Bilkent University staff and students currently followed up by the Health Center are as follows:

There are a total of 7 active cases.

Of these patients, 4 are academic staff, 1 is support staff, 1 is student, 1 is employee of on campus companies. During the last week, 4 new cases were reported and 10 patients have recovered.

All patients are being treated at home and in isolation. Their contacts in campus are thoroughly followed up by the Health Center.

We wish speedy recovery to all COVID patients.",
            ],
            [
                'private'     => false,
                'title'       => 'Psychology Department Senior Project Poster Presentations',
                'description' => "Title: Psychology Department Senior Project Poster Presentations / Psikoloji Bölümü Bitirme Tezi Poster Sunumları

Dear colleagues and students,

You are cordially invited to the Senior Project Poster Presentations, held by the Department of Psychology.

Date: May 11 2022, Wednesday
Time: 16:30-18:30
Place: FEASS Building Entrance Floor Atrium
------------------------------------------------------
Sevgili öğretim elemanları ve öğrencilerimiz,

Sizleri Psikoloji Bölümü'nün Bitirme Projeleri Poster Sunumları'na davet ediyoruz.

Tarih: 11 Mayıs 2022, Çarşamba
Saat: 16:30-18:30
Yer: İİSBF Binası Giriş Katı",
            ],
            [
                'private'     => false,
                'title'       => 'CTIS Senior Projects Poster Presentations',
                'description' => '
CTIS Senior Projects Poster Presentations: On Wednesday May 11th between 9:00am – 5:00pm,

Department of Information Systems and Technologies (CTIS) will organize its annual Senior Projects Poster Day for 2022.

The event will be held at CTIS Department, East Campus, C-Building, on the top floor.
Everyone is invited to this event.

---------------------------------------------------------------------------------
CTIS Bitirme Projeleri Poster Sunumları: 11 Mayıs Çarşamba 9:00am – 5:00pm saatleri arasında,

Doğu Kampus, C-Binası, en üst katta, Bilişim Sistemleri ve Teknolojileri Bölümünde geleneksel 2022 Bitirme Projelerinin Poster Sunumlarını gerçekleştirilecektir.

Bu etkinliğe herkes davetlidir.',
            ],
            [
                'private'     => false,
                'title'       => 'Registration Information for Summer School',
                'description' => 'Dear Students,

Below please find a summary of the 2021-2022 Summer School registration procedures.

Warm regards,

Prof. Dr. Uğur Güdükbay
Director, Bilkent University Summer School

Registration Information for Summer School

The current list of 2022 Summer School courses can be found by following the “Offerings” link at http://w3.bilkent.edu.tr/bilkent/summer-school/. The list will be finalized before course registrations. While we make every effort to offer courses requested by a number of students, we cannot guarantee that every requested course will be offered.

A student can enroll in at most two courses in the Summer School.

Students who have not already passed ENG 101 may ONLY take ENG 101 in the Summer School; these students are not allowed to take any other courses in the Summer School. Students who have passed ENG 101 but have not yet passed ENG 102 may take ENG 102 and one other course, if they wish to do so; they cannot take other courses without taking ENG 102 as well. For this reason, students taking ENG 102 and another course will not be allowed to withdraw from ENG 102 alone.

If you wish to take courses in the Summer School, it is highly recommended that you make a request for these courses via Student Review System (SRS), independent of whether these courses are already listed under Summer School Offerings or not. SRS “Summer School Course Request” service under “Academic Services” menu will be available for course requests between 9 May 2022, Monday, 10:00 and 23 May 2022, Monday, 17:30. Students who make course requests will have priority during course registrations.

Taking courses in the Summer School is optional and subject to tuition fees. Bilkent Scholarships cover the Summer School tuition fees as well. Students on comprehensive and full Bilkent scholarships do not have to pay any tuition for Summer School courses; students on partial Bilkent scholarships pay the percentage of fees that are not covered by their scholarships. However, please note that mandatory attendance requirements for scholarship students apply in the Summer School as well; if you show poor attendance in a course taken in the Summer School, your scholarship will be suspended.

A student who will graduate by repeating and passing only one course that s/he failed (got an F or FX grade) in Fall or Spring semesters of 2021-2022 academic year is eligible to enroll in the Individual Studies course, provided that the course s/he failed is not offered in the Summer School. These students must apply to through SRS (Under “Academic Services” menu, Summer School Individual Study Course Application) between 1 June 2022, Wednesday, 17:30 and 3 June 2022, Friday, 16:30. The tuition fee for Individual Studies is determined based on the number of credits of the course for which the student is taking the Individual Studies course. Please note that if the course to be repeated is an elective course, there must not be any other course in the same elective course set that the student can take. If there is such a course, the student must take that course to graduate.

Before actual course registrations, students have to make an “enrollment payment plan” via SRS (under Services menu), starting 30 May 2022, Monday, 10:00, in order to be able to pay their Summer School tuition fees. Here students indicate the courses they intend to take and the appropriate fees are calculated and communicated to the banks. Fees may then be paid at any branch (including internet branches) of Garanti Bank, İş Bank, or Yapı Kredi Bank. Please note that the bank must see the amount that you have to pay on the payment screen with your Student ID. Otherwise, the payment will not be credited for summer school courses.

You must first make the payment in order to be able to register. After the payment has been made, the cost of the corresponding credits will be charged in your account. During the registration, you may choose other courses with the same or less credit. If courses with more credit are desired, the enrollment payment plan should be changed to make the necessary payment. If less credit is desired, either you can ask for a refund or leave the overpayment on the account to be used in the following semesters.

Summer School registrations will be based on an appointment system, giving priority to students who have made course requests. Summer School registration appointments will be announced through SRS on 1 June 2022, Wednesday, 10:00. The first phase will be online registration, on 2 June 2022, Thursday, between 09:00 and 13:00. In this phase, students who have registration appointments can register via SRS. Students cannot register before their appointment times.

The second phase will be held between 2 June 2022, Thursday, 13:00 and 3 June 2022, Friday, 23:59. In this phase, all students can register via SRS. Please note that you are allowed to add or drop any courses during these two days. However, you will not be allowed to drop any courses after 3 June 2022, Friday, 23:59. Please, plan your registrations accordingly.

Summer School classes will begin on 6 June 2022, Monday. The last day to add a course is 7 June 2022, Tuesday, 17:30.

Until the end of the add period, the Director of Summer School may decide to cancel a course offering due to insufficient number of students. Students whose registrations are cancelled due to closed courses may add other courses until 8 June 2022, Wednesday, 13:30, or ask for a refund of tuition fees.
Summary of Registration Steps:
1. Course requests via SRS (9-23 May 2022) (optional but recommended)
2. Enrollment payment plan via SRS (begins 30 May 2022)
3. Tuition fee payment to the bank (not applicable to students on comprehensive and full Bilkent scholarship)
4. Course registrations via SRS (2-3 June 2022)
5. Drop deadline: 3 June 2022, 23:59.
6. Add deadline: 7 June 2022, 17:30.',
            ],
        ];

        collect($announcements)->each(fn ($announcement) => Announcement::factory()->create($announcement));
    }
}
