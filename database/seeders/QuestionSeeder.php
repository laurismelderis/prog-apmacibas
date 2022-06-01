<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Course;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (checkIfSeeded(get_class($this))) {
            echo "Already seeded <br>";
            return;
        }
        $course = Course::where('name', 'python')->pluck('id');
        $questions = [
            [
                'question' => '      Čau! Prieks tevi šeit satikt un vēl lielāks ir prieks, ka izlēmi mācīties programmēt.<br>
                Droši vien jau esi pamanījis, ka mums visapkārt ir daudz, jo daudz dažādas<br> datortehnikas. Tik tiešām dzīvojam laikā , kad datori ir ik visur un ikviena no mums dzīvē. Vai<br> esi aizdomājies, kāda būtu mūsu dzīve bez tā visa?! Droši vien būtu dikti garlaicīgi un<br> neinteresanti – tev vairs nebūtu datorspēļu, mamma vairs nevarētu sameklēt jaunu pīrāgu<br> receptes internetā, bet tētis paskatīties jaunākās filmas. Taču to visu mēs varam darīt pateicoties<br> tam, ka kaut kad ne tik sen cilvēki ir iemācījušies programmēt. Vai arī tu gribi iemācīties<br> programmēt un iespējams pat sataisīt savu spēli, kuru spēlēt kopā ar draugiem?!<br>
                Ja tava atbilde ir jā, tad laipni aicināts Python programmēšanas valodas kursā, šeit tu apgūsi pašus programmēšanas pamatus, sapratīsi, kas ir funkcijas un mainīgie un iemācīsies rakstīt pirmās koda rindiņas. Nu tad aiziet!',
                'theory' => '1'
            ],
            [
                'question' => '      Nē, Python nav čūska, bet gan viena no populārākajām programmēšanas valodām pasaulē. Bet kas tad vispār ir programmēšanas valodas? Tās ir dažādu vārdu un simbolu kombinācija, kas būs viegli saprotama datoram, lai tas varētu izpildīt dažādas komandas. Python valoda ir tik vienkārša un cilvēkam pietuvināta, ka pat mēs ar tevi zinot elementāru angļu valodu varētu saprast, kas datoram ir likts darīt. Piemēram, paskaties uz attēlu zemāk, vai saproti, ko mēs liekam datoram izdarīt?<br>
                      Nebēdājies arī ja nesaprati, mēs to visu apgūsim jau nākamajā nodaļā. Bet pašlaik ir vērts paturēt prātā, ka Python valoda tik tiešām ir ļoti vienkārša, tā dēļ to izmanto daudzi lieli pasaules uzņēmumi, piemēram, Google, meklēšanas serviss, NASA, Amerikas kosmosa aģentūra un pat Pixar, multfilmu studija, tu noteikti esi redzējis multfilmas “Rotaļlietu stāsts” vai “Lieliskie”, jā, jā, visas šīs multenes tapa arī ar Python palīdzību.',
                'theory' => '1'
            ],
            [
                'question' => '      Python valodā ir daudz un dažādu interesantu funkciju, kas palīdz mums veidot savu programmu. Bet kas tad īsti ir funkcija? Vienkāršiem vārdiem sakot tas ir sava veida darbinieks kas programmā izpilda kādu noteiktu funkciju, tāpat kā pārdevējs veikalā vai šoferis autobusā. Katrai funkcijai tieši tāpat kā cilvēkam ir savs vārds, pēc kura parasti seko iekavas, kurās mēs arī ierakstam noteiktus parametrus, bet par to vēlāk.<br> 
                      Funkcijas mēs varam veidot paši, lai tās izpildītu kādu konkrēti mums nepieciešamu uzdevumu vai arī izmantot funkcijas, kuras ir izgudrojis kāds gudrs programmētājs sen pirms mēs vēl sākām mācīties. Viena no tādam funkcijām ir print(), ko daži no jums atceras no iepriekšējās nodaļas. Varbūt, kāds ir padomājis, ka ar šīs funkcijas palīdzību mēs varēsim kaut ko reāli izprintēt ar mājās esošo printeri?Bet diemžēl tas nav gluži tā, funkcija print() mums palīdz izvadīt kaut kādu informāciju uz datora ekrāna. Patrenēsimies! Par piemēru paņemsim mūsu iepriekšējā nodaļā apskatīto programmas fragmentu:<br>
                print("Sveiks, skolēn!")<br>
                Iedarbinot mūsu kodu mēs dabūsim šādu rezultātu:<br>
                Sveiks, skolēn!<br>
                      Tātad ko mēs saprotam, no šī? Mēs varam uzrakstīt uz ekrāna jebkādu tekstu? Tieši tā! Svarīgakāis nosacījums ir, lai tas būtu iekavās un pats teksts būtu pēdiņās. Pamēģināsim vēlreiz!<br>
                Kādu rezultātu mēs iegūsim, ja uzrakstīsim: <br>print("Es mācos programmēt!")<br>
                      Ja atbildēji, ka uz ekrāna redzēsim tekstu Es mācos programmēt, tad tu esi liels malacis, ja tomēr kļūdījies, tad izlasi šo nodaļu vēlreiz un tu noteikti sapratīsi :) <br>
                      Taču vai esat aizdomājušies, kas notiks, ja kaut ko uzrakstīsim nepareizi, piemēram aizmirsīsim ielikt pēdiņas. Aplūkosim! Iedarbināsim šādu koda rindiņu, kur esam aizmirsuši tekstu ielikt pēdiņās: <br>
                print(Vai pareizi?)<br>
                Rezultātā programma izvadīs kļūdu!<br>
                Tas saucas par sintaksi jeb kā pareizi rakstīt kodu , katrai programmēšanas valodai tā nedaudz atšķiras, un tāpat kā skolotaja latviešu valodas stundās norādīs uz kļūdu, tā arī Python centīsies saprast, kas nogāja greizi. Tie, kas labāk saprot angļu valodu noteikti ir pamanījuši šī kļūdas paziņojumu pēdējo rindiņu, kur ir rakstīts invalid syntax jeb kļūdaina sintakse, kas nozīmē, ka kodā kaut kur ir ieviesusies sintakses kļūda, kas mums ir jāatrod un jaizlabo, šajā gadījumā neielikām pēdiņas, un tiklīdz mēs to izlabojam:<br>
                print("Vai pareizi?")<br>
                ',
                'theory' => '1'
            ],
            [
                'question' => '      Šajā nodaļā mēs aplūkosim Python valodā pieejamos datu tipus un kā, piemēram, x piešķirt vērtību 100. Zinam, zinam, atkal jau tā matmātika ar saviem burtiem, bet tici mums, šoreiz rēķināt neko nevajadzēs, to visu tavā vietā izdarīs dators.<br>
                      Tātad kas tad vispār ir mainīgie? Tās ir sava veida mājiņas, kur mēs uzglabājam kādu skaitlisku vai rakstisku vērtību, lai katru reizi mūsu kodā šis mainīgai nebūtu jāraksta no jauna, mēs to vienkārši varam nodod kādai mājiņai jeb mainīgajam, kas šo vērtību uzturēs un saglabās<br>
                Aplūkosim kā piešķirt mainīgajam vērtību Python valodā:<br>
                x = 5<br>
                      Kā jau mēs minējām Python valoda tik tiešām ir ļoti vienkārša un piešķirt mainīgajam vērtību ir tik pat kā vienkārši to ierakstīt matemātikas kladē x = 5, taču atšķirība tāda, ka tagad šo informāciju uzglabā dators nevis mūsu smadzenes. Taču ja mēs vēlamies apskatīt x vērtību, kā lai mēs uzzinam kāda tā ir? Ja teici, ka jāizmanto iepriekš apskatītā funkcija print(), tad tu esi liels malacis. Pārbaudīsim, vai mēs visu daram pareizi:<br>
                x = 5<br>
                print("x")<br>
                Palaižot šo mūsu nelielo kodu, iegūstam šādu rezultātu:<br>
                x<br>
                      Kaut kas acīmredzami ir nepareizi, vēlējāmies apskatītes x vērtību, bet kā rezultātu uz ekrāna redzam tikai x, kļūdas paziņojuma arī nekāda nav. Tieši tā, jo no datora viedokļa tā nav kļūda, tas izdarīja tieši to ko mēs lūdzām, izvadīja uz ekrāna TEKSTUĀLU INFORMĀCIJU, ko iekļāvām pēdiņās. Tātad tas nozīmē, ka viss, ko mēs ieliekam pēdiņās funkcijā print() tieši tā arī tie izvadīts uz ekrāna. Ja mēs gribam apskatīties x vērtību, tad mums ir jānodod tas kā mainīgais funkcijas print() bez pēdiņām. Tātad šādi:<br>
                x = 5<br>
                print(x)<br>
                Rezultātā tagad iegūsim mainīgā vērtību, ko tas sevī glabā:<br>
                5<br>
                Līdzīgi mainīgajos varam glabāt arī tekstuālu informāciju:<br>
                y = "Man patīk programmēt"<br>
                print(y)<br>
                      Kā redzam arī šeit glabājot teksta informāciju tā tieši tāpat kā funkcijā print() ir jāievada pēdiņās. Rezultātā uz ekranā redzēsim to pašu informāciju, ko saglabājām mainīgajā y:<br>
                Man patīk programmēt <br>
                      Bet kāpēc lai vispār lietot mainīgos, ja vienkārši katru reizi var no jauna ierakstīt mums vajadzīgo ciparu vai tekstu. Jā, protams, var. Taču, kad sāksiet rakstīt garākas programmas, sapratīsiet, ka labāk jau pašā sākumā saglabāt nepieciešamos datus mainīgajos, lai atkārtoti tos neizmantotu, kā arī tāpēc ka laika gaitā tie var mainīties.<br>
                      Vēl viens knifiņš, kā lai ekrānā izvada ka x = 5, nevis vienkārši x vērtību? Ļoti vienkārši, šeit būs jāapvieno šodien un iepriekšējā teorijas nodarbībā mācītais lūk šādā veidā:<br>
                x = 5<br>
                print("x = ", x)<br>
                Tātad apskatīsim, kas šeit notiek? <br>
                      1. Sākumā mēs piešķiram mainīgajam x vērtību 5;<br>
                      2. Tad izmantojam funkciju print();<br>
                      3. Funkcijas print() iekšienē mēs sākumā pēdiņās rakstam tekstu, ko vēlamies <br>redzēt uz ekrāna, tad aizveram pēdiņas un ieliekam komatu apzimējot, ka tālāk<br> sekos kāds mainīgais;<br>
                      4. Ierakstam mainīgo x bez pēdiņām, jo mēs gribam zināt tā vērtību<br>
                Rezultātā mēs iegūstam:<br>
                x = 5<br>
                      Kopā esam ieguvuši mums nepieciešamo rezultātu x = 5, kur x = bija teksta informācija pēdiņās, bet 5 ir mainīgā x vērtība.<br>
                ',
                'theory' => '1'
            ],
            [
                'question' => '<h3>Kas ir Python?</h3>',
                'answers' => [
                    ['Programmēšanas valoda', 'correct'],
                    'No angļu valodas - pitons (čūska)'
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Python ir ļoti sarežģīta valoda</h3>',
                'answers' => [
                    ['Aplami', 'correct'],
                    'Patiesi'
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Kādam nolūkam izmanto funkciju print()?</h3>',
                'answers' => [
                    ['Informācijas izvadīšanai uz ekrāna', 'correct'],
                    'Printēšanai ar printeri',
                    'Tāda funkcija neeksistē'
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Uzraksti, kā uz ekrāna izvadīt teikumu Python valodā – Man labi sanāk programmēt</h3>',
                'answers' => [
                    ['print("Man labi sanāk programmēt")', 'correct'],
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Kas ir mainīgais?</h3>',
                'answers' => [
                    ['“Mājiņa”, kas uzglabā kādu konkrētu vērtību', 'correct'],
                    'Funkcijas nosaukums',
                    'Cilveks, kas visu laiku mainās'
                ],
                'theory' => '0'
            ],
            [
                'question' => '      Tapāt kā matemātikā mēs skolā izpildam dažādas matemātiskas operācijas, tāpat to var <br>izdarīt arī ar Python programmēšanas valodas palīdzību. Aplūkosim 4 aritmētiskās<br> pamatoperācijas:<br>
                1) Saskaitīšana<br>
                      Saskaitīšana Python valodā tiek īstenota ar + zīmi starp cipariem vai mainīgajiem. Aplūkosim dažus īstenošanas piemērus:<br>
                print(5+2)<br>
                7<br>
                      Augstākesošajā piemērā var redzēt, ka saskaitīšanu var īstenot vienkārši funkcijas<br> print() iekšienē saskaitot divus ciparus (protams, bez pēdiņam, jo savādāk tiks izvadīta pati<br> operācija nevis rezultāts), redzam ka to izpildot iegūstam pareizu rezultātu. Taču vēl mēs varam<br> saskaitīt divus dažādus mainīgos, izmantojot zināšanas, ko ieguvām iepriekšējā nodaļā.<br>
                Piemēram šādi: <br>
                x = 5<br>
                y = 2<br>
                rez = x + y<br>
                print(rez)<br>
                5<br>
                      Šajā gadījumā mēs sākumā nododam x mainīgajam vērtību 5, bet y mainīgajam<br> vērtību 2, tad ieviešam vēl vienu mainīgo rez, kurā saglabājam x un y summu, tā kā x mainīgajā<br> ir saglabāta vērtība 5, bet y mainīgajā vērtība 2, tad būtībā rez = 5 + 2, tātad rez būtu jāglabā<br> vērtība 7. Aplūkojot to ar funkcijas print() palīdzību secinam ka tā tik tiešām ir.<br>
                2) Atņemšana<br>
                      Atņemšana Python valodā tiek īstenota ar – zīmi ar mainīgajiem vai cipariem.<br>
                Tieši tāpat, kā saskaitot, arī atņemt var funcijas print() ietvaros. Piemēram print(5-2).<br> Rezultātā iegūsim 3. Taču aplūkosim atņemšanu ar vērtību nodošanu mainīgajiem:<br>
                x = 5<br>
                y = 2<br>
                rez = x - y<br>
                print(rez)<br>
                3<br>
                Tāpat kā saskaitīšanas gadījumā arī šeit mēs sākumā nododam mainīgajiem x un y<br> vērtības 5 un 2 attiecīgi un tad mainīgajā rez saglabājam x un y starpību, kurai būtu jābūt 3 (5-2=3),<br> funkcijā print() mēs arī ierakstījām teksta informāciju, lai atspoguļotu rezultātu<br> saprotamākā veidā (būtu jābūt rez = 3), rezultāts kā redzams ir pareizs.<br>
                3) Reizināšana <br>
                      Reizināšana Python valodā tiek īstenota ar “*” zīmi ar mainīgajiem vai cipariem.<br>
                Tieši tāpat, kā iepriekš, arī reizināt var  funcijas print() ietvaros. Piemēram <br>print (5*2). Rezultātā iegūsim 10. Taču aplūkosim reizināšanu ar vērtību nodošanu mainīgajiem:<br> 
                x = 5<br>
                y = 2<br>
                rez = x * y<br>
                print(rez)<br>
                10<br>
                      Tāpat kā iepriekšējos gadījumā arī šeit mēs sākumā nododam mainīgajiem x un y<br> vērtības 5 un 2 attiecīgi un tad mainīgajā rez saglabājam x un y reizinājumu, kuram būtu jābūt<br> 10 (5*2=10), funkcijā print() mēs arī ierakstījām teksta informāciju, lai atspoguļotu rezultātu<br> saprotamākā veidā (būtu jābūt rez = 10), rezultāts kā redzams ir pareizs.<br>
                4) Dalīšana<br>
                      Dalīšana Python valodā tiek īstenota ar “/” zīmi ar mainīgajiem vai cipariem. <br>
                Tieši tāpat, kā iepriekš, arī dalīt var  funcijas print() ietvaros. Piemēram print (10/2).<br> Rezultātā iegūsim 5. Taču aplūkosim dalīšanu ar vērtību nodošanu mainīgajiem:<br>
                x = 10<br>
                y = 2<br>
                rez = x / y<br>
                print(rez)<br>
                5<br>
                      Tāpat kā iepriekšējos gadījumā arī šeit mēs sākumā nododam mainīgajiem x<br> un y vērtības 10 un 2 attiecīgi un tad mainīgajā rez saglabājam x un y dalījumu, kuram būtu jābūt<br> 5 (10/2=5), funkcijā print() mēs arī ierakstījām teksta informāciju, lai atspoguļotu rezultātu<br> saprotamākā veidā (būtu jābūt rez = 5), rezultāts kā redzams ir pareizs.<br>',
                'theory' => '1'
            ],
            [
                'question' => '      Pirms ķerties pie paša cikla for un saprašanas, kas tas ir. Sākumā aplūkosim tādu<br> 
                lietu, kā saraksts. Dzīvē mēs pieradām, ka saraksts ir kaut kādā noteiktā secībā sakopoti dati,
                <br> vai ne? Ari Python valodā saraksts ir tieši tas pats - sakopoti dati. Aplūkosim, kā izveidot
                <br> sarakstu Python valodā:<br>
                saraksts = ["Jānis", "Evita", "Līga"]
                print(saraksts)<br>
                      Saraksts Python valoda ir principā datu kopa, tā sintakse ir līdzīga kā mainīgo<br> 
                definēšana, tieši tāpat ir jāpiešķir saraksta nosaukums, augstākesošajā piemērā tas ir saraksts<br> 
                un tad jāliek vienādības zīme un jādefinē pats saraksts, kas ir ieskauts kvadrātainās iekavās,<br> 
                kurās ieraksta saraksta datus. Ja tā ir tekstuāla informācija tad tā tāpat kā iepriekš ir jāiekļauj<br> 
                pēdiņās un starp datiem jāliek komats, taču ja informācija būs aritmētiska ar kuru vēlāk tiks<br> 
                veikti matemātiski aprēķini, tad pēdiņas nav nepieciešamas, bet gan tikai komati starp datiem.<br>
                      Lai attēlotu sarakstu izamntojam funkciju print() un ievietojam tajā mūsu saraksta<br> 
                nosaukumu tieši tāpat kā iepriekš darījām ar mainīgajiem. Rezultātā iegūstam visu sarakstu<br>
                kopumā:<br>
                ["Jānis", "Evita", "Līga"]<br>
                      Taču dažreiz ir nepieciešams izgūt kādus konkrētus saraksta datus, nevis visu sarakstu<br>
                kopumā, tad tieši šeit nāk palīgā cikli.<br>
                      Kas tad vispār ir cikli? Tā ir sava veida funkcija (pareizāk, metode), kas palīdz izet<br>
                cauri visam sarakstam un izgūt mums nepieciešamo informāciju.<br>
                      Šajā nodaļa plašāk apskatīsim ciklu for. Sintakses piemērs:<br>
                saraksts =  ["Jānis", "Evita", "Līga"]<br>
                for i in saraksts:<br>
                      print(i)<br>
                      Šeit redzam jau iepriekš definētu sarakstu un tad mūsu ciklu for, kur sintakse ir sekojoša:<br>
                1. Sākumā pats cikla nosaukums for<br>
                2. Tad izvēlamies mainīgā nosaukumu, kurā glabāsim saraksta datus un ierakstām to<br>
                3. Tad ir vārds “in” kas apzīmēs, kurā sarakstā mēs vēlamies ciklu iedarbināt<br>
                4. Pēc “in” mēs norādam pašu saraksta nosaukumu<br>
                5. Tad ieliekam kolu, pēc kura norādam ko darīt ar izgūto informāciju, mūsu gadījumā<br> ar funkcijas print() palīdzību mēs ekrānā parādīsim visus saraksta elementus pa
                <br> vienam (jāatzīmē, ka ejot cauri sarakstam cikls for katru element saglabā mainīgajā I<br> (mūsu gadījumā) un tad izvada uz ekrānu, tā tas turpinās līdz tiek sasniegtas saraksta<br>
                beigas)<br>
                Rezultātā mēs iegūstam:<br>
                Jānis<br>
                Evita<br>
                Līga<br>
                      Jāatzīmē, ka ar cikliem var darīt daudz dažādu interesantu lietu, piemēram, var pat<br>
                izpildīt aritmētiskas operācijas ar sarakstu:<br>
                saraksts = [1,2,3,4,5]<br>
                sum = 0<br>
                for i in saraksts:<br>
                      sum = sum + i<br>
                print(sum)<br>
                Ko mēs ievērojam skatoties uz resultātu:<br>
                1. Sākumā ir definēts saraksts ar 5 cipariem<br>
                2. Tad ir definēts mainīgais sum ar sākotnējo vērtību 0<br>
                3. Tad iesākas cikls, kas izies cauri mūsu sarakstam<br>
                4. Izejot cauri sarakstam, katru reizi pie sum tiks pieskaitīts viens no sarakstā<br>
                esošajiem cipariem, līdz tie būs beigušies, kas būtībā nozīmē, ka mēs<br>
                saskaitīsim visus saraksta ciparus kopā<br>
                5. Beigās tiks izvadīta summa ar funkcijas print() palīdzību<br>
                Rezultātā iegūstam: <br>
                15<br>
                Rezultāts ir pareizs, jo 1+2+3+4+5 tik tiešām ir 15.
                ',
                'theory' => '1'
            ],
            [
                'question' => '<h3>Python programmēšanas valodu var izmantot arī kā kalkulatoru</h3>',
                'answers' => [
                    ['Patiesi', 'correct'],
                    'Aplami',
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Veikt aritmētiskas operācijas drīkst arī funkcijas print() iekšienē</h3>',
                'answers' => [
                    ['Patiesi', 'correct'],
                    'Aplami',
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Kas ir saraksts?</h3>',
                'answers' => [
                    ['Datu kopa', 'correct'],
                    'Lapiņa ar vārdiem',
                    'Funkija Python valodā'
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Ko apzīmē “in” for cikla sintaksē?</h3>',
                'answers' => [
                    ['Kurā sarakstā notiks cikla darbība', 'correct'],
                    'Kur tiks izvadīta informācija',
                    'Kurā mainīgajā saglabāt datus'
                ],
                'theory' => '0'
            ],
            [
                'question' => '<h3>Kādu rezultātu izvadīs komanda print(5+5)?</h3>',
                'answers' => [
                    ['10', 'correct'],
                ],
                'theory' => '0'
            ],

        ];
        foreach ($questions as $question) {
            Question::factory()
                ->count(1)
                ->question($question['question'], $course[0], $question['theory'])
                ->create();
        }
        storeSeed(get_class($this));
    }
}
