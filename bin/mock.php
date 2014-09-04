<?php

require_once(dirname(dirname(__FILE__)).'/init.php');

use Cocur\Slugify\Slugify;

R::debug(true);

$slugify  = new Slugify();
$faker    = Faker\Factory::create();

echo "Clearing database.\n";
R::nuke();

echo "Creating actions.\n";
// Actions -------------------
$names = array(
  'pages.list',
  'pages.create',
  'pages.edit',
  'pages.delete', 
  'spex.list',
  'spex.create',
  'spex.edit',
  'spex.delete',
  'users.list',
  'users.create',
  'users.edit',
  'users.delete',
  'memberships.list',
  'memberships.create',
  'memberships.edit',
  'memberships.delete',
  'roles.list',
  'roles.create',
  'roles.edit',
  'roles.delete',
  'events.list',
  'events.create',
  'events.edit',
  'events.delete',
  'news.list',
  'news.create',
  'news.edit',
  'news.delete',
  'actions.list',
  'actions.create',
  'actions.edit',
  'actions.delete', 
  'tickets.list',
  'tickets.create',
  'tickets.edit',
  'tickets.delete',
  'contacts.list',
  'contacts.create',
  'contacts.edit',
  'contacts.delete',
  'images.list',
  'images.create',
  'images.edit',
  'images.delete',
  'music.list',
  'music.create',
  'music.edit',
  'music.delete',
  'gyckel.list',
  'gyckel.create',
  'gyckel.edit',
  'gyckel.delete'
);
$action_ids = array();
foreach($names as $name) {
  $action       = R::dispense('action');
  $action->name = $name;
  $action_ids[] = R::store($action);
}

echo "Creating roles\n";
$role                   = R::dispense('role');
$role->name             = 'Superadmin';
$role->sharedActionList = R::loadAll('action', $action_ids);
R::store($role);

echo "Creating users.\n";
// Users -------------------
$user                 = R::dispense('user');
$dynamic_salt         = generatePassword(40);
$user->username       = 'test';
$user->email          = 'patrik.weibull@gmail.com';
$user->salt           = $dynamic_salt;
$user->hash           = md5(sprintf('%s%s%s', Config::get('static.salt'), 'test', $dynamic_salt));
$user->sharedRoleList = array($role);
R::store($user);

// Pages -------------------

echo "Creating pages.\n";
// Create start page
$page               = R::dispense('page');
$page->user         = $user;
$page->slug         = 'start';
$page->timesupdated = 1;
$page->created      = time();
$page->changed      = time();
$page->priority     = 1;
$page->title        = 'Filosofspexet';
$page->template     = 'start.view.php';
$page->leadtext     = 'Varmt välkommen till Filosofiska Lätta Knästående SpexarGardet (i kortform Filosofspexet)!';
$page->bodytext     = '<b>Vilka är vi då?</b> Jo, vi är Göta studentkårs spex.<br /><br />
<b>Men vad är ett spex?</b> Jo en spexförening blandar teater, dans, sång, komik, musik, fester och kalabalik! Vi sätter årligen upp en stor spexproduktion samt en höstrevy. Mellan föreställningarna ägnar vi oss åt stämsång, teaterövningar, kakätning, kramar och annat minst lika spexikalt.<br />';
R::store($page);

// Create gückel page// Create start page
$page = R::dispense('page');
$page->user     = $user;
$page->slug     = 'gyckel';
$page->title    = 'Gyckel';
$page->template = 'pages.view.php';
$page->leadtext = 'Filosofiska Lätta Knästående Spexargardet är till uthyrning. Dess Stora Gücklarorden kommer gärna och underhåller er vid det tillfälle ni önskar.';
$page->bodytext = '<p> Vi gücklar på allt från företagets personaldag till fotbollsklubbens
20-årsjubiléum. Dagtid, kvällstid, på middag eller konferens, när som
helst kan vi anlitas för att sprida litet glädje och spexglans över
tillställningen.
<p>Vår repertoar består av sketcher, körsånger, solosånger m.m. Om ni hör
av er tillräcklig långt i förväg kan vi om ni vill även skriva sketcher
eller sånger just för er.
<p>Kontakta vår <a href="gucklemaestra@filosofspexet.se">gücklemaestra</a>
om du är intresserad av att boka oss, eller bara vill ha mer information.</p>
<p>Här är några exempel på tillfällen då vi uppträtt den senaste 
tiden:</p>
<ul>
<li> Kulturnatta (okt 2010)
<li> Samfaks finalsittning (sep 2010)
<li> Student10, Trädgårn (sep 2010)
<li> SLUG:s examensmiddag (jan 2010)
<li> Kulturnatta (okt 2009)
<li> Akademiska Rodden (sep 2009)
<li> Student 09, Trädgårn (sep 2009)
<li> Övningssittningar reko och MN6 (aug 2009)
<li> SLUG:s examensmiddag (jun 2009)
<li> Valborgsfirande Trädgårdsföreningen (apr 2009)
<li> FFSex 25-årsjubileum (apr 2009)
<li> Disputation på arkeologen (mar 2009)
</ul>';
R::store($page);

// Create cookies page
$page = R::dispense('page');
$page->user     = $user;
$page->slug     = 'cookies';
$page->title    = 'Cookies';
$page->template = 'pages.view.php';
$page->leadtext = 'Denna websida använder sig av Cookies. Enligt lagen om elektronisk kommunikation måste vi informera om
<ul>
<li>Att webplatsen innehåller cookies</li>
<li>Vad dessa cookies används till</li>
<li>Hur cookies kan undvikas</li></ul>';
$page->bodytext = '<p>På <a href="http://www.filosofspexet.se">www.filosofspexet.se</a> används en sessionscookie för att identifiera inloggade användare. Denna försvinner när du stänger din webläsare. Utan cookies kommer inloggningsfunktionen på sidan inte att fungera. Cookies kan undvikas genom att du ställer in din webläsare så att den automatiskt nekar cookies, alternativt ger dig information om när cookies används och låter dig göra aktiva val från gång till gång.</p>';
R::store($page);

// Create musik page
$page = R::dispense('page');
$page->user     = $user;
$page->slug     = 'musik';
$page->title    = 'Musik';
$page->template = 'pages.view.php';
$page->leadtext = 'Nedan finns sånger från några av våra framträdanden som mp3-filer. Klicka och lyssna!';
$page->bodytext = '<h2>Allmänna spexsånger</h2>
<p><ul><li><a href="'.Uri::createFile('/old/musik/Paradmarsch.mp3').'">Filosofspexets Paradmarsch</A>, 
framförd på Mölndals Sjukhus ögonkliniks personalfest på Valands 
festvåning i mars 2002.
<li><a href="'.Uri::createFile('/old/musik/Anengangdaran.mp3').'">Än en gång däran</A>, den klassiska
dryckesvisan, i Filosofspexets tappning. Inspelat vid samma tillfälle som 
ovan.
<li><a href="'.Uri::createFile('/old/musik/Punschragg.mp3').'">Punschragg.</a> Dr&uuml;ckesvisan
fr&aring;n 1995 &aring;rs spex, Earl Greys Testamente. Sången
framf&ouml;rs här inte av spexet, utan av en kvintett som tidigare
terroriserat G&ouml;teborgs k&ouml;rer med sina alster. Melodi: 
Alexander\'s Ragtime Band</ul>
<h2>Ur Rödvit från 1966</h2>
<p>En EP spelades in i samband med premiären 1987 av dokumentationsskäl.
<ul><li><a href="'.Uri::createFile('/old/musik/Rodvit/Terzetten.mp3').'">Terzetten.</a> Askungen och Prinsen kommer fint
överens, medan Per Svinaherde känner sig brädad och grymtar i bakgrunden. Mel: Così fan tutte, Terzetto: La mia Dorabella capace non é.
<li><a href="'.Uri::createFile('/old/musik/Rodvit/Draksnaps.mp3').'">Drakens snapsvisa.</a> Egentligen dricker ju inte detta tvåhövdade monster annat än rödsprit, men vem kan stå emot omgivningens tryck? Mel: Woody Guthrie, This Land is Your land.
<li><a href="'.Uri::createFile('/old/musik/Rodvit/Draken.mp').'3">Drakens entrésång.</a> Denna säregna blandning av tvåhövdat sagodjur och svensk flygmaskin J-35 presenterar sig och ger glimtar ur sitt liv. Mel: Beethoven, Für Elise.
<li><a href="'.Uri::createFile('/old/musik/Rodvit/Drottning-Prins.mp3').'">Duett Drottningen-Prinsen.</a> Drottningen lockar prinsen med strålande framtidsutsikter och får slutligen gensvar. Mel: Flotow, Martha: Lyonels aria och Porterlied.
<li><a href="'.Uri::createFile('/old/musik/Rodvit/Drottningen.mp3').'">Drottningen</a> sjunger om hur hon sov på en ärt och därefter charmerade kejsaren.
<li><a href="'.Uri::createFile('/old/musik/Rodvit/Rodvit.mp3').'">Rödvits visa.</a> Prinsessan ser slutet på sin långa tid på glasberget, då hon presenteras för draken. Mel: Ferlin, På Arendorffs tid.
<li><a href="'.Uri::createFile('/old/musik/Rodvit/Kejsaren.mp3').'">Kejsarens entrésång.</a> Kejsarhusets familjepolitik
skildras av dess något släpphänta men understundom klarsynta överhuvud. Mel: Zeller,
Fågelhandlaren: Farfarssången (Wie mein Ahnl Zwanzig Jahr).
<li><a href="'.Uri::createFile('/old/musik/Rodvit/Prins-Drake.mp3').'">Trio Prinsen-Draken.</a> Under kampen om Rödvit händer det sig, att Prinsen hotar Draken, vilken dock inte blir svaret skyldig. Mel: Mozart, Don Giovanni: Deh vieni alla finestra. </ul>
<h2>Ur van Tomen från 1964</h2>
<p>EP:n spelades in till 10-årsjubileet för att vara bilaga i programhäftet.
<p>Genomgående, beledsagande Steinwayflygel: Bodil
<ul><li><a href="'.Uri::createFile('/old/musik/vanTomen/vanTomen.mp3').'">van Tomens entrésång.</a> 
Sven (barit.). Jaan van Tomen gör entré i sina stiliga helylletrikåer. Mel: Var jag går i skogar berg och dalar, psalm 251.
<li><a href="'.Uri::createFile('/old/musik/vanTomen/Diana.mp3').'">Dianas klagan.</a> Limpus (ten. - 
barit.). Diana är missnöjd med sin lott som åsidosatt hustru åt van Tomen. 
Hon längtar hem till sta\'n. Flotow, Martha: M\'appari tutt\' amor.
<li><a href="'.Uri::createFile('/old/musik/vanTomen/Maharadja.mp3').'">Maharadjasången.</a> 
Tommie (croon.), Limpus (häst). Haremsvakten presenterar sin härskares liv 
och lustar. Mel: Gamle svarten<li><a href="'.Uri::createFile('/old/musik/vanTomen/Fruktfat.mp3').'">Fruktfat - duetten.</a> Limpus
(ten.), Anso Gherza (barit.). Den vältalige Marahadjan vill utöka sin
samling. Diana ser en möjlighet att lämna djunglen, och spelar svårfångad. 
Mel: Mozart, Don Giovanni: Là ci darem la mano.
<li><a href="'.Uri::createFile('/old/musik/vanTomen/Kom.mp3').'">Kom, kom.</a>
Filosofspexets sångkör. Dryckesvisan för året, som fortfarande sjungs på 
Filosofspexets fester då och då. Notera det tidstypiska politiska 
inlägget. Mel: Emanuel Jonasson, Gökvalsen
<li><a href="'.Uri::createFile('/old/musik/vanTomen/Duett.mp3').'">Jättegott - duetten.</a> Storebjörn
(disör, ten.), Sven (barit.). Fru Palm, Dianas mor, blir knäsvag vid åsynen av van Tomens vältränade fysionomi. Tyvärr något kapat stycke (sången alltså!). Mel: Benatzky, Vita hästen: Det måste vara underbart.
<li><a href="'.Uri::createFile('/old/musik/vanTomen/Humoresk.mp3').'">Förförelse - humoresk.</a>
Limpus (med höga C), Anso Gherza (mezzo - barit.). Diana har kommit till
insikt om Marahadjans låga avsikter. Mel: Dvorak, humoresk.
<li><a href="'.Uri::createFile('/old/musik/vanTomen/SpexKom.mp3').'">Kom.</a> Extranummer. Snapsvisa
för dagligt bruk.
<li><a href="'.Uri::createFile('/old/musik/vanTomen/Finalfinal.mp3').'">Finalfinal</a>. Glassbomben har 
detonerat och ensemblen gått hädan. De är inte ledsna för det. Inspelad 
<b>live</b> på Kåren 1966, och endast nyligen överförd till digitalt format! Melodi: Wagner, 
Tannhäuser: Dir, Göttin der Liebe (Venus lov).
</ul>';
R::store($page);

// Create verksamhet page
$page = R::dispense('page');
$page->user     = $user;
$page->slug     = 'verksamhet';
$page->title    = 'Vaddå spex?';
$page->template = 'pages.view.php';
$page->leadtext = 'Spex är ett svenskt, akademiskt, parodierande teaterstycke med anakronismer och "röd tråd", skapat av amatörer för att roa och oftast framfört bara under en mycket kort tid. Denna definition är på inga sätt allomfattande; vill du veta vad ett spex är, gå och se ett!';
$page->bodytext = '<p>Filosofiska L&auml;tta Kn&auml;st&aring;ende SpexarGardet (i kortform Filosofspexet) &auml;r en k&aring;rf&ouml;rening under <a href="http://www.gota.gu.se" title="G&ouml;ta studentk&aring;r">G&ouml;ta studentk&aring;r</a> som utan h&auml;nsyn till &ouml;vriga k&aring;rf&ouml;reningar blandar teater, dans, s&aring;ng, musik, fester, komik, och kalabalik. Vi tr&auml;ffas varje tisdag fr&aring;n cirkus klockan 18 och fram&aring;t i
  spexrummet i k&auml;llaren p&aring; Studenternas Hus.</p>
<p> Filosofspexets namn kan vara missledande; vi har ingenting med &auml;mnet filosofi att g&ouml;ra. Namnet kommer av att Filosofspexet var en k&aring;rf&ouml;rening under Filosofiska Fakulteternas Studentk&aring;r, en av de tre studentk&aring;rer som under 2010 <a href="http://www.gota.gu.se/karen/historia/" title="G&ouml;ta studentk&aring;rs historia">slogs samman</a> f&ouml;r att bilda G&ouml;ta studentk&aring;r. G&ouml;ta studentk&aring;r representerar samtliga studenter vid G&ouml;teborgs universitet inom humanistiska, naturvetenskapliga, samh&auml;llsvetenskapliga och utbildningsvetenskapliga fakulteten, IT-fakulteten samt studenter vid Utbildnings- och forskningsn&auml;mnden f&ouml;r l&auml;rarutbildning, och alla dessa &auml;r naturligtvis v&auml;lkomna som medlemmar i f&ouml;reningen.</p>
<p>Tycker du att detta l&aring;ter som n&aring;got f&ouml;r dig, kom f&ouml;rbi v&aring;r f&ouml;reningsrum p&aring; Studenternas Hus, d&auml;r vi tr&auml;ffas tisdagar efter 18.00, eller h&ouml;r av dig till <a href="' . Uri::create('/kontakt') . '">staben</a>!</p>
<p> <a href="'. Uri::create('/historia') . '">Filosofiska L&auml;tta Kn&auml;st&aring;ende
SpexarGardets historia</a></p>';
R::store($page);

// Create historia page
$page = R::dispense('page');
$page->user     = $user;
$page->slug     = 'historia';
$page->title    = 'Filosofspexets historia i sammandrag';
$page->template = 'pages.view.php';
$page->leadtext = '';
$page->bodytext = '<p>Filosofspexets historia b&ouml;rjar 1914, d&aring; stadens f&ouml;rsta
originalspex sattes upp. Det hette "Slaget vid Svoldern eller Den farliga
&aring;ldern eller Han syntes aldrig mer", och var fyllt av anspelningar p&aring;
tidens politiska och kulturella begivenheter. Namnet Filosofspexet fanns inte
p&aring; den tiden, det existerade ju inga andra g&ouml;teborgsspex som man
kunde f&ouml;rv&auml;xlas med,  och organisationen var l&ouml;s eller obefintlig.
Den informella atmosf&auml;r som r&aring;dde illustreras ganska v&auml;l av
uppgifterna i en recension av "Slaget vid Svoldern", d&auml;r man kan l&auml;sa
att publiken fick v&auml;nta b&aring;de l&auml;nge och v&auml;l innan rid&aring;n
gick upp. Sk&aring;despelarna satt n&auml;mligen p&aring; en krog, och tyckte att
det var trevligare d&auml;r &auml;n p&aring; scenen.</p>

<p>Denna informella stil r&aring;dde under vad
man kan kalla f&ouml;r spexets f&ouml;rsta epok, 1914-1949. Man satte upp
flera spex om &aring;ret, till exempel vid Lucia och Valborg och vid recentiorssk&auml;ndningar
(den tidens nollningar), men de var korta och av en ganska enkel karakt&auml;r.
Trots detta finns n&aring;gra riktiga guldkorn bland de bevarade manuskripten
i G&ouml;teborgs Landsarkiv; ett exempel &auml;r "Robert och Signe", ett
till synes seri&ouml;st upplagt drama d&auml;r allting g&aring;r fel. Andra
alster, som "Hertigen av Mecklenburgs kraschan", anspelar s&aring; mycket
p&aring; sin tids studentv&auml;rld att de &auml;r fullst&auml;ndigt obegripliga
idag. N&auml;mnas b&ouml;r ocks&aring; Torsten Brodins "Det trojanska kriget",
ett ambiti&ouml;st upplagt spex som blev sm&aring;tt ber&ouml;mt och sattes
upp flera g&aring;nger under den senare delen av epoken.</p>

<p>Under femtiotalet l&aring;g spexandet nere,
med undantag f&ouml;r en isolerad produktion som handlade om Gustav II
Adolf, men 1964 var det dags igen. En ny generation spexare satte d&aring;
upp "van Tomen", som liksom "Det trojanska kriget" skulle bli 
f&ouml;rem&aring;l
f&ouml;r nyupps&auml;ttning. Nu kom namnet Filosofspexet, liksom en (mer
eller mindre) fast organisation och l&aring;nga, genomarbetade spex som
kostat de inblandade blod, svett och natts&ouml;mn. Fr&aring;n denna andra
epok (1964-1970) kommer spex som det mytologiska "Odysseus", sagoangreppet
"R&ouml;dvit", ber&auml;ttelsen om den amoraliske f&ouml;rlorade sonen
"Morgan" och "Svansl&ouml;s", som faktiskt s&aring;gs av Pelle Svansl&ouml;s
skapare G&ouml;sta Knutsson himself.</p>

<p>Det blev fult med icke-politiska studentr&ouml;relser,
och andra epoken gick i graven. P&aring; &aring;ttiotalet r&aring;dde mer
gynnsamma f&ouml;rh&aring;llanden, och nya studenter f&ouml;rs&ouml;kte
skriva nya spex, men man var inte s&aring; n&ouml;jd med resultaten. Id&eacute;
efter id&eacute; f&ouml;rkastades, och 1987 best&auml;mde man sig f&ouml;r
att g&ouml;ra en nyupps&auml;ttning av ovan n&auml;mnda "R&ouml;dvit".
Detta avl&ouml;pte v&auml;l, och tv&aring; &aring;r senare kom det nyskrivna
"Frank Ensten". Tredje epoken (1987 och fram&aring;t) hade d&auml;rmed
inletts.</p>

<p>I skrivande stund har den tredje epoken varat
i femton &aring;r. De spex som producerats har ofta haft ett litter&auml;rt
tema, som musikalparodin "M&ouml;ss", det shakespeariska "Amleth med H
p&aring; slutet", deckaren "Earl Greys testamente" och disneyattacken "Walt
Dizzy", men produktioner med det mer traditionella historiska temat har
ocks&aring; kunnat besk&aring;das. Exempel p&aring; detta &auml;r ber&auml;ttelserna
om Bellman i, ja just det, "Bellman", kung Salomo i "940 BC" och Karl XIV
Johans drottning i "Desideria". Ytterligare en nyupps&auml;ttning har hunnits
med, n&auml;mligen av "Morgan" fr&aring;n epok tv&aring;. P&aring; senare
&aring;r har man ocks&aring; haft en relativt omfattande gyckelverksamhet,
och farit land och rike runt f&ouml;r att spela sketcher, sjunga s&aring;nger
och f&aring; folk att betala f&ouml;r detta.</p>

<p>Sammanfattningsvis kan v&auml;l s&auml;gas
att den innevarande epoken redan &auml;r mer &auml;n dubbelt s&aring; l&aring;ng
som den f&ouml;reg&aring;ende, men inte ens h&auml;lften s&aring; l&aring;ng
som den f&ouml;rsta. Filosofspexet visar dock inga tecken p&aring; att
sakta ner. Nya friska spexare tillkommer hela tiden, och en dag kanske
den f&ouml;rsta epokens l&auml;ngdrekord hamnar i farozonen. Den som spexar
f&aring;r se.</p>

<p>STEFAN H&Ouml;GBERG</p>';
R::store($page);

// Create 404 page
$page           = R::dispense('page');
$page->user     = $user;
$page->slug     = '404';
$page->title    = '404 - Sidan kunde ej hittas';
$page->leadtext = 'Det var väl synd.';
$page->bodytext = 'Om du kom hit via en intern länk på hemsidan så har vår webbredaktör automatiskt underrättats om detta.';
R::store($page);

// Create login page
$page       = R::dispense('page');
$page->user = $user;
$page->slug = 'login';
R::store($page);

echo "Creating news.\n";

for($i = 0; $i < 10; $i++) {
  $news           = R::dispense('news');
  $news->headline = $faker->sentence;
  $news->slug     = $slugify->slugify($news->headline);
  $news->bodytext = $faker->paragraph;
  $t              = $faker->unixTime;
  $news->created  = $t;
  $news->changed  = $t;
  $news->user     = $user;
  R::store($news);
}

echo "Creating events\n";
$urpremier                = R::dispense('event');
$urpremier->title         = 'Urpremier';
$urpremier->description   = 'Urpremier för Kejsarens Elixir';
$urpremier->start         = strtotime('2014-02-07 19:00');
$urpremier->end           = strtotime('2014-02-07 21:30');

$galapremier              = R::dispense('event');
$galapremier->title       = 'Galapremier';
$galapremier->description = 'Galapremier för Kejsarens Elixir';
$galapremier->start       = strtotime('2014-02-08 18:00');
$galapremier->end         = strtotime('2014-02-08 20:30');

$foreningsforestallning               = R::dispense('event');
$foreningsforestallning->title        = 'Föreningsföreställning';
$foreningsforestallning->description  = 'Föreningsföreställning för Kejsarens Elixir';
$foreningsforestallning->start        = strtotime('2014-02-14 19:00');
$foreningsforestallning->end          = strtotime('2014-02-14 21:30');

$spexforestallning1               = R::dispense('event');
$spexforestallning1->title        = 'Spexföreställning';
$spexforestallning1->description  = 'Spexföreställning för Kejsarens Elixir';
$spexforestallning1->start        = strtotime('2014-02-21 19:00');
$spexforestallning1->end          = strtotime('2014-02-21 21:30');

$spexforestallning2               = R::dispense('event');
$spexforestallning2->title        = 'Spexföreställning';
$spexforestallning2->description  = 'Spexföreställning för Kejsarens Elixir';
$spexforestallning2->start        = strtotime('2014-02-22 18:00');
$spexforestallning2->end          = strtotime('2014-02-22 20:30');

$draegforestallning               = R::dispense('event');
$draegforestallning->title        = 'Draegföreställning';
$draegforestallning->description  = 'Draegföreställning för Kejsarens Elixir';
$draegforestallning->start        = strtotime('2014-03-01 18:00');
$draegforestallning->end          = strtotime('2014-03-01 20:30');

echo "Creating spex.\n";
$spex                 = R::dispense('spex');
$spex->created        = time();
$spex->changed        = time();
$spex->slug           = $slugify->slugify('Kejsarens Elixir');
$spex->user           = $user;
$spex->visible        = true;
$spex->title          = 'Kejsarens Elixir';
$spex->alttitle       = 'Med Sven Hedin öfver land till Mugholistan';
$spex->theme          = 'Ett spex om kärlek, kol och kameler';
$spex->ticketprice    = '100';
$spex->discountprice  = '70';
$spex->image          = 'kejsarens.jpg';
$spex->posterauthor   = 'Hampus Lybeck';
$spex->teaser         = 'Sven Hedin och hans vän Gustaf Adolf, kronprins av Sverige måste genomsöka mystiska ruiner i Taklamakan efter receptet på kejsar Shi Huangdis livselixir, innan den walesiska exploatörskan Diana Jones spränger allt i luften för att öppna världens största kolgruva. Föga anar man vad som lurar där ute mellan Tianshans och Kunluns snötäckta toppar. Vad är det för förbannelse som det pratas om?';
$spex->ownEventList   = array($urpremier,$galapremier,$foreningsforestallning,$spexforestallning1,$spexforestallning2,$draegforestallning);
R::store($spex);
