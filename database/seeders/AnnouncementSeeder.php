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
                'title' => 'Bilkent History Graduate Symposium 2022',
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
Concluding Remarks (Mehmet Kalpaklı, Chair, Department of History).
",
            ]
        ];

        collect($announcements)->each(fn ($announcement) => Announcement::factory()->create($announcement));
    }
}
