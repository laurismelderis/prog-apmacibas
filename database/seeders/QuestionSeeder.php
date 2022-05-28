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
            echo "Already seeded \n";
            return;
        }
        $course = Course::where('name', 'python')->pluck('id');
        $questions = [
            [
                'question' => '\tČau! Prieks tevi šeit satikt un vēl lielāks ir prieks, ka izlēmi mācīties programmēt.\n
                Droši vien jau esi pamanījis, ka mums visapkārt ir daudz, jo daudz dažādas\n datortehnikas. Tik tiešām dzīvojam laikā , kad datori ir ik visur un ikviena no mums dzīvē. Vai\n esi aizdomājies, kāda būtu mūsu dzīve bez tā visa?! Droši vien būtu dikti garlaicīgi un\n neinteresanti – tev vairs nebūtu datorspēļu, mamma vairs nevarētu sameklēt jaunu pīrāgu\n receptes internetā, bet tētis paskatīties jaunākās filmas. Taču to visu mēs varam darīt pateicoties\n tam, ka kaut kad ne tik sen cilvēki ir iemācījušies programmēt. Vai arī tu gribi iemācīties\n programmēt un iespējams pat sataisīt savu spēli, kuru spēlēt kopā ar draugiem?!\n
                Ja tava atbilde ir jā, tad laipni aicināts Python programmēšanas valodas kursā, šeit tu apgūsi pašus programmēšanas pamatus, sapratīsi, kas ir funkcijas un mainīgie un iemācīsies rakstīt pirmās koda rindiņas. Nu tad aiziet!',
                'theory' => '1'
            ],
            [
                'question' => '\tNē, Python nav čūska, bet gan viena no populārākajām programmēšanas valodām pasaulē. Bet kas tad vispār ir programmēšanas valodas? Tās ir dažādu vārdu un simbolu kombinācija, kas būs viegli saprotama datoram, lai tas varētu izpildīt dažādas komandas. Python valoda ir tik vienkārša un cilvēkam pietuvināta, ka pat mēs ar tevi zinot elementāru angļu valodu varētu saprast, kas datoram ir likts darīt. Piemēram, paskaties uz attēlu zemāk, vai saproti, ko mēs liekam datoram izdarīt?\n
                \tNebēdājies arī ja nesaprati, mēs to visu apgūsim jau nākamajā nodaļā. Bet pašlaik ir vērts paturēt prātā, ka Python valoda tik tiešām ir ļoti vienkārša, tā dēļ to izmanto daudzi lieli pasaules uzņēmumi, piemēram, Google, meklēšanas serviss, NASA, Amerikas kosmosa aģentūra un pat Pixar, multfilmu studija, tu noteikti esi redzējis multfilmas “Rotaļlietu stāsts” vai “Lieliskie”, jā, jā, visas šīs multenes tapa arī ar Python palīdzību.',
                'theory' => '1'
            ],
            [
                'question' => '\tPython valodā ir daudz un dažādu interesantu funkciju, kas palīdz mums veidot savu programmu. Bet kas tad īsti ir funkcija? Vienkāršiem vārdiem sakot tas ir sava veida darbinieks kas programmā izpilda kādu noteiktu funkciju, tāpat kā pārdevējs veikalā vai šoferis autobusā. Katrai funkcijai tieši tāpat kā cilvēkam ir savs vārds, pēc kura parasti seko iekavas, kurās mēs arī ierakstam noteiktus parametrus, bet par to vēlāk.\n 
                \tFunkcijas mēs varam veidot paši, lai tās izpildītu kādu konkrēti mums nepieciešamu uzdevumu vai arī izmantot funkcijas, kuras ir izgudrojis kāds gudrs programmētājs sen pirms mēs vēl sākām mācīties. Viena no tādam funkcijām ir print(), ko daži no jums atceras no iepriekšējās nodaļas. Varbūt, kāds ir padomājis, ka ar šīs funkcijas palīdzību mēs varēsim kaut ko reāli izprintēt ar mājās esošo printeri?Bet diemžēl tas nav gluži tā, funkcija print() mums palīdz izvadīt kaut kādu informāciju uz datora ekrāna. Patrenēsimies! Par piemēru paņemsim mūsu iepriekšējā nodaļā apskatīto programmas fragmentu:\n
                print("Sveiks, skolēn!")\n
                Iedarbinot mūsu kodu mēs dabūsim šādu rezultātu:\n
                Sveiks, skolēn!\n
                \tTātad ko mēs saprotam, no šī? Mēs varam uzrakstīt uz ekrāna jebkādu tekstu? Tieši tā! Svarīgakāis nosacījums ir, lai tas būtu iekavās un pats teksts būtu pēdiņās. Pamēģināsim vēlreiz!\n
                Kādu rezultātu mēs iegūsim, ja uzrakstīsim: \nprint("Es mācos programmēt!")\n
                \tJa atbildēji, ka uz ekrāna redzēsim tekstu Es mācos programmēt, tad tu esi liels malacis, ja tomēr kļūdījies, tad izlasi šo nodaļu vēlreiz un tu noteikti sapratīsi :) \n
                \tTaču vai esat aizdomājušies, kas notiks, ja kaut ko uzrakstīsim nepareizi, piemēram aizmirsīsim ielikt pēdiņas. Aplūkosim! Iedarbināsim šādu koda rindiņu, kur esam aizmirsuši tekstu ielikt pēdiņās: \n
                print(Vai pareizi?)\n
                Rezultātā programma izvadīs kļūdu!\n
                Tas saucas par sintaksi jeb kā pareizi rakstīt kodu , katrai programmēšanas valodai tā nedaudz atšķiras, un tāpat kā skolotaja latviešu valodas stundās norādīs uz kļūdu, tā arī Python centīsies saprast, kas nogāja greizi. Tie, kas labāk saprot angļu valodu noteikti ir pamanījuši šī kļūdas paziņojumu pēdējo rindiņu, kur ir rakstīts invalid syntax jeb kļūdaina sintakse, kas nozīmē, ka kodā kaut kur ir ieviesusies sintakses kļūda, kas mums ir jāatrod un jaizlabo, šajā gadījumā neielikām pēdiņas, un tiklīdz mēs to izlabojam:\n
                print("Vai pareizi?")\n
                ',
                'theory' => '1'
            ],
            [
                'question' => '\tŠajā nodaļā mēs aplūkosim Python valodā pieejamos datu tipus un kā, piemēram, x piešķirt vērtību 100. Zinam, zinam, atkal jau tā matmātika ar saviem burtiem, bet tici mums, šoreiz rēķināt neko nevajadzēs, to visu tavā vietā izdarīs dators.\n
                \tTātad kas tad vispār ir mainīgie? Tās ir sava veida mājiņas, kur mēs uzglabājam kādu skaitlisku vai rakstisku vērtību, lai katru reizi mūsu kodā šis mainīgai nebūtu jāraksta no jauna, mēs to vienkārši varam nodod kādai mājiņai jeb mainīgajam, kas šo vērtību uzturēs un saglabās\n
                Aplūkosim kā piešķirt mainīgajam vērtību Python valodā:\n
                x = 5\n
                \tKā jau mēs minējām Python valoda tik tiešām ir ļoti vienkārša un piešķirt mainīgajam vērtību ir tik pat kā vienkārši to ierakstīt matemātikas kladē x = 5, taču atšķirība tāda, ka tagad šo informāciju uzglabā dators nevis mūsu smadzenes. Taču ja mēs vēlamies apskatīt x vērtību, kā lai mēs uzzinam kāda tā ir? Ja teici, ka jāizmanto iepriekš apskatītā funkcija print(), tad tu esi liels malacis. Pārbaudīsim, vai mēs visu daram pareizi:\n
                x = 5\n
                print("x")\n
                Palaižot šo mūsu nelielo kodu, iegūstam šādu rezultātu:\n
                x\n
                \tKaut kas acīmredzami ir nepareizi, vēlējāmies apskatītes x vērtību, bet kā rezultātu uz ekrāna redzam tikai x, kļūdas paziņojuma arī nekāda nav. Tieši tā, jo no datora viedokļa tā nav kļūda, tas izdarīja tieši to ko mēs lūdzām, izvadīja uz ekrāna TEKSTUĀLU INFORMĀCIJU, ko iekļāvām pēdiņās. Tātad tas nozīmē, ka viss, ko mēs ieliekam pēdiņās funkcijā print() tieši tā arī tie izvadīts uz ekrāna. Ja mēs gribam apskatīties x vērtību, tad mums ir jānodod tas kā mainīgais funkcijas print() bez pēdiņām. Tātad šādi:\n
                x = 5\n
                print(x)\n
                Rezultātā tagad iegūsim mainīgā vērtību, ko tas sevī glabā:\n
                5\n
                Līdzīgi mainīgajos varam glabāt arī tekstuālu informāciju:\n
                y = "Man patīk programmēt"\n
                print(y)\n
                \tKā redzam arī šeit glabājot teksta informāciju tā tieši tāpat kā funkcijā print() ir jāievada pēdiņās. Rezultātā uz ekranā redzēsim to pašu informāciju, ko saglabājām mainīgajā y:\n
                Man patīk programmēt \n
                \tBet kāpēc lai vispār lietot mainīgos, ja vienkārši katru reizi var no jauna ierakstīt mums vajadzīgo ciparu vai tekstu. Jā, protams, var. Taču, kad sāksiet rakstīt garākas programmas, sapratīsiet, ka labāk jau pašā sākumā saglabāt nepieciešamos datus mainīgajos, lai atkārtoti tos neizmantotu, kā arī tāpēc ka laika gaitā tie var mainīties.\n
                \tVēl viens knifiņš, kā lai ekrānā izvada ka x = 5, nevis vienkārši x vērtību? Ļoti vienkārši, šeit būs jāapvieno šodien un iepriekšējā teorijas nodarbībā mācītais lūk šādā veidā:\n
                x = 5\n
                print("x = ", x)\n
                Tātad apskatīsim, kas šeit notiek? \n
                \t1. Sākumā mēs piešķiram mainīgajam x vērtību 5;\n
                \t2. Tad izmantojam funkciju print();\n
                \t3. Funkcijas print() iekšienē mēs sākumā pēdiņās rakstam tekstu, ko vēlamies \nredzēt uz ekrāna, tad aizveram pēdiņas un ieliekam komatu apzimējot, ka tālāk\n sekos kāds mainīgais;\n
                \t4. Ierakstam mainīgo x bez pēdiņām, jo mēs gribam zināt tā vērtību\n
                Rezultātā mēs iegūstam:\n
                x = 5\n
                \tKopā esam ieguvuši mums nepieciešamo rezultātu x = 5, kur x = bija teksta informācija pēdiņās, bet 5 ir mainīgā x vērtība.\n
                ',
                'theory' => '1'
            ],
            [
                'question' => 'Kas ir Python?',
                'answers' => [
                    ['Programmēšanas valoda', 'correct'],
                    'No angļu valodas - pitons (čūska)'
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Python ir ļoti sarežģīta valoda',
                'answers' => [
                    ['Aplami', 'correct'],
                    'Patiesi'
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Kādam nolūkam izmanto funkciju print()?',
                'answers' => [
                    ['Informācijas izvadīšanai uz ekrāna', 'correct'],
                    'Printēšanai ar printeri',
                    'Tāda funkcija neeksistē'
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Uzraksti, kā uz ekrāna izvadīt teikumu Python valodā – Man labi sanāk programmēt',
                'answers' => [
                    ['print("Man labi sanāk programmēt")', 'correct'],
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Kas ir mainīgais?',
                'answers' => [
                    ['“Mājiņa”, kas uzglabā kādu konkrētu vērtību', 'correct'],
                    'Funkcijas nosaukums',
                    'Cilveks, kas visu laiku mainās'
                ],
                'theory' => '0'
            ],
            [
                'question' => '\tTapāt kā matemātikā mēs skolā izpildam dažādas matemātiskas operācijas, tāpat to var \nizdarīt arī ar Python programmēšanas valodas palīdzību. Aplūkosim 4 aritmētiskās\n pamatoperācijas:\n
                1) Saskaitīšana\n
                \tSaskaitīšana Python valodā tiek īstenota ar + zīmi starp cipariem vai mainīgajiem. Aplūkosim dažus īstenošanas piemērus:\n
                print(5+2)\n
                7\n
                \tAugstākesošajā piemērā var redzēt, ka saskaitīšanu var īstenot vienkārši funkcijas\n print() iekšienē saskaitot divus ciparus (protams, bez pēdiņam, jo savādāk tiks izvadīta pati\n operācija nevis rezultāts), redzam ka to izpildot iegūstam pareizu rezultātu. Taču vēl mēs varam\n saskaitīt divus dažādus mainīgos, izmantojot zināšanas, ko ieguvām iepriekšējā nodaļā.\n
                Piemēram šādi: \n
                x = 5\n
                y = 2\n
                rez = x + y\n
                print(rez)\n
                5\n
                \tŠajā gadījumā mēs sākumā nododam x mainīgajam vērtību 5, bet y mainīgajam\n vērtību 2, tad ieviešam vēl vienu mainīgo rez, kurā saglabājam x un y summu, tā kā x mainīgajā\n ir saglabāta vērtība 5, bet y mainīgajā vērtība 2, tad būtībā rez = 5 + 2, tātad rez būtu jāglabā\n vērtība 7. Aplūkojot to ar funkcijas print() palīdzību secinam ka tā tik tiešām ir.\n
                2) Atņemšana\n
                \tAtņemšana Python valodā tiek īstenota ar – zīmi ar mainīgajiem vai cipariem.\n
                Tieši tāpat, kā saskaitot, arī atņemt var funcijas print() ietvaros. Piemēram print(5-2).\n Rezultātā iegūsim 3. Taču aplūkosim atņemšanu ar vērtību nodošanu mainīgajiem:\n
                x = 5\n
                y = 2\n
                rez = x - y\n
                print(rez)\n
                3\n
                Tāpat kā saskaitīšanas gadījumā arī šeit mēs sākumā nododam mainīgajiem x un y\n vērtības 5 un 2 attiecīgi un tad mainīgajā rez saglabājam x un y starpību, kurai būtu jābūt 3 (5-2=3),\n funkcijā print() mēs arī ierakstījām teksta informāciju, lai atspoguļotu rezultātu\n saprotamākā veidā (būtu jābūt rez = 3), rezultāts kā redzams ir pareizs.\n
                3) Reizināšana \n
                \tReizināšana Python valodā tiek īstenota ar “*” zīmi ar mainīgajiem vai cipariem.\n
                Tieši tāpat, kā iepriekš, arī reizināt var  funcijas print() ietvaros. Piemēram \nprint (5*2). Rezultātā iegūsim 10. Taču aplūkosim reizināšanu ar vērtību nodošanu mainīgajiem:\n 
                x = 5\n
                y = 2\n
                rez = x * y\n
                print(rez)\n
                10\n
                \tTāpat kā iepriekšējos gadījumā arī šeit mēs sākumā nododam mainīgajiem x un y\n vērtības 5 un 2 attiecīgi un tad mainīgajā rez saglabājam x un y reizinājumu, kuram būtu jābūt\n 10 (5*2=10), funkcijā print() mēs arī ierakstījām teksta informāciju, lai atspoguļotu rezultātu\n saprotamākā veidā (būtu jābūt rez = 10), rezultāts kā redzams ir pareizs.\n
                4) Dalīšana\n
                \tDalīšana Python valodā tiek īstenota ar “/” zīmi ar mainīgajiem vai cipariem. \n
                Tieši tāpat, kā iepriekš, arī dalīt var  funcijas print() ietvaros. Piemēram print (10/2).\n Rezultātā iegūsim 5. Taču aplūkosim dalīšanu ar vērtību nodošanu mainīgajiem:\n
                x = 10\n
                y = 2\n
                rez = x / y\n
                print(rez)\n
                5\n
                \tTāpat kā iepriekšējos gadījumā arī šeit mēs sākumā nododam mainīgajiem x\n un y vērtības 10 un 2 attiecīgi un tad mainīgajā rez saglabājam x un y dalījumu, kuram būtu jābūt\n 5 (10/2=5), funkcijā print() mēs arī ierakstījām teksta informāciju, lai atspoguļotu rezultātu\n saprotamākā veidā (būtu jābūt rez = 5), rezultāts kā redzams ir pareizs.\n',
                'theory' => '1'
            ],
            [
                'question' => '\tPirms ķerties pie paša cikla for un saprašanas, kas tas ir. Sākumā aplūkosim tādu\n 
                lietu, kā saraksts. Dzīvē mēs pieradām, ka saraksts ir kaut kādā noteiktā secībā sakopoti dati,
                \n vai ne? Ari Python valodā saraksts ir tieši tas pats - sakopoti dati. Aplūkosim, kā izveidot
                \n sarakstu Python valodā:\n
                saraksts = ["Jānis", "Evita", "Līga"]
                print(saraksts)\n
                \tSaraksts Python valoda ir principā datu kopa, tā sintakse ir līdzīga kā mainīgo\n 
                definēšana, tieši tāpat ir jāpiešķir saraksta nosaukums, augstākesošajā piemērā tas ir saraksts\n 
                un tad jāliek vienādības zīme un jādefinē pats saraksts, kas ir ieskauts kvadrātainās iekavās,\n 
                kurās ieraksta saraksta datus. Ja tā ir tekstuāla informācija tad tā tāpat kā iepriekš ir jāiekļauj\n 
                pēdiņās un starp datiem jāliek komats, taču ja informācija būs aritmētiska ar kuru vēlāk tiks\n 
                veikti matemātiski aprēķini, tad pēdiņas nav nepieciešamas, bet gan tikai komati starp datiem.\n
                \tLai attēlotu sarakstu izamntojam funkciju print() un ievietojam tajā mūsu saraksta\n 
                nosaukumu tieši tāpat kā iepriekš darījām ar mainīgajiem. Rezultātā iegūstam visu sarakstu\n
                kopumā:\n
                ["Jānis", "Evita", "Līga"]\n
                \tTaču dažreiz ir nepieciešams izgūt kādus konkrētus saraksta datus, nevis visu sarakstu\n
                kopumā, tad tieši šeit nāk palīgā cikli.\n
                \tKas tad vispār ir cikli? Tā ir sava veida funkcija (pareizāk, metode), kas palīdz izet\n
                cauri visam sarakstam un izgūt mums nepieciešamo informāciju.\n
                \tŠajā nodaļa plašāk apskatīsim ciklu for. Sintakses piemērs:\n
                saraksts =  ["Jānis", "Evita", "Līga"]\n
                for i in saraksts:\n
                \tprint(i)\n
                \tŠeit redzam jau iepriekš definētu sarakstu un tad mūsu ciklu for, kur sintakse ir sekojoša:\n
                1. Sākumā pats cikla nosaukums for\n
                2. Tad izvēlamies mainīgā nosaukumu, kurā glabāsim saraksta datus un ierakstām to\n
                3. Tad ir vārds “in” kas apzīmēs, kurā sarakstā mēs vēlamies ciklu iedarbināt\n
                4. Pēc “in” mēs norādam pašu saraksta nosaukumu\n
                5. Tad ieliekam kolu, pēc kura norādam ko darīt ar izgūto informāciju, mūsu gadījumā\n ar funkcijas print() palīdzību mēs ekrānā parādīsim visus saraksta elementus pa
                \n vienam (jāatzīmē, ka ejot cauri sarakstam cikls for katru element saglabā mainīgajā I\n (mūsu gadījumā) un tad izvada uz ekrānu, tā tas turpinās līdz tiek sasniegtas saraksta\n
                beigas)\n
                Rezultātā mēs iegūstam:\n
                Jānis\n
                Evita\n
                Līga\n
                \tJāatzīmē, ka ar cikliem var darīt daudz dažādu interesantu lietu, piemēram, var pat\n
                izpildīt aritmētiskas operācijas ar sarakstu:\n
                saraksts = [1,2,3,4,5]\n
                sum = 0\n
                for i in saraksts:\n
                \tsum = sum + i\n
                print(sum)\n
                Ko mēs ievērojam skatoties uz resultātu:\n
                1. Sākumā ir definēts saraksts ar 5 cipariem\n
                2. Tad ir definēts mainīgais sum ar sākotnējo vērtību 0\n
                3. Tad iesākas cikls, kas izies cauri mūsu sarakstam\n
                4. Izejot cauri sarakstam, katru reizi pie sum tiks pieskaitīts viens no sarakstā\n
                esošajiem cipariem, līdz tie būs beigušies, kas būtībā nozīmē, ka mēs\n
                saskaitīsim visus saraksta ciparus kopā\n
                5. Beigās tiks izvadīta summa ar funkcijas print() palīdzību\n
                Rezultātā iegūstam: \n
                15\n
                Rezultāts ir pareizs, jo 1+2+3+4+5 tik tiešām ir 15.
                ',
                'theory' => '1'
            ],
            [
                'question' => 'Python programmēšanas valodu var izmantot arī kā kalkulatoru',
                'answers' => [
                    ['Patiesi', 'correct'],
                    'Aplami',
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Veikt aritmētiskas operācijas drīkst arī funkcijas print() iekšienē',
                'answers' => [
                    ['Patiesi', 'correct'],
                    'Aplami',
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Kas ir saraksts?',
                'answers' => [
                    ['Datu kopa', 'correct'],
                    'Lapiņa ar vārdiem',
                    'Funkija Python valodā'
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Ko apzīmē “in” for cikla sintaksē',
                'answers' => [
                    ['Kurā sarakstā notiks cikla darbība', 'correct'],
                    'Kur tiks izvadīta informācija',
                    'Kurā mainīgajā saglabāt datus'
                ],
                'theory' => '0'
            ],
            [
                'question' => 'Kādu rezultātu izvadīs komanda print(5+5)',
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
