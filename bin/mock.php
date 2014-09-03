<?php

require_once(dirname(dirname(__FILE__)).'/init.php');

R::debug(true);

$faker = Faker\Factory::create();

echo "Clearing database.\n";
R::nuke();

// Pages -------------------

echo "Creating pages.\n";
// Create start page
$page = R::dispense('page');
$page->slug = 'start';
$page->title = 'Filosofspexet';
$page->template = 'start.view.php';
$page->leadtext = 'Varm välkommen till Filosofiska Lätta Knästående SpexarGardet (i kortform Filosofspexet)!';
$page->bodytext = '<b>Vilka är vi då?</b> Jo, vi är Göta studentkårs spex.<br /><br />
<b>Men vad är ett spex?</b> Jo en spexförening blandar teater, dans, sång, komik, musik, fester och kalabalik! Vi sätter årligen upp en stor spexproduktion samt en höstrevy. Mellan föreställningarna ägnar vi oss åt stämsång, teaterövningar, kakätning, kramar och annat minst lika spexikalt.<br />';
R::store($page);

// Create gückel page// Create start page
$page = R::dispense('page');
$page->slug = 'gyckel';
$page->title = 'Gyckel';
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
$page->slug = 'cookies';
$page->title = 'Cookies';
$page->template = 'pages.view.php';
$page->leadtext = 'Denna websida använder sig av Cookies. Enligt lagen om elektronisk kommunikation måste vi informera om
<ul>
<li>Att webplatsen innehåller cookies</li>
<li>Vad dessa cookies används till</li>
<li>Hur cookies kan undvikas</li></ul>';
$page->bodytext = '<p>På <a href="http://www.filosofspexet.se">www.filosofspexet.se</a> används en sessionscookie för att identifiera inloggade användare. Denna försvinner när du stänger din webläsare. Utan cookies kommer inloggningsfunktionen på sidan inte att fungera. Cookies kan undvikas genom att du ställer in din webläsare så att den automatiskt nekar cookies, alternativt ger dig information om när cookies används och låter dig göra aktiva val från gång till gång.</p>';
R::store($page);

// Create verksamhet page
$page = R::dispense('page');
$page->slug = 'verksamhet';
$page->title = 'Vaddå spex?';
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
$page->slug = 'historia';
$page->title = 'Filosofspexets historia i sammandrag';
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
$page = R::dispense('page');
$page->slug = '404';
$page->title = '404 - Sidan kunde ej hittas';
$page->leadtext = 'Det var väl synd.';
$page->bodytext = 'Om du kom hit via en intern länk på hemsidan så har vår webbredaktör automatiskt underrättats om detta.';
R::store($page);

// Create login page
$page = R::dispense('page');
$page->slug = 'login';
R::store($page);

echo "Creating actions.\n";
// Actions -------------------
$names = array(
  'pages.create',
  'pages.edit',
  'pages.delete'
);
$action_ids = array();
foreach($names as $name) {
  $action = R::dispense('action');
  $action->name = $name;
  $action_ids[] = R::store($action);
}

echo "Creating users.\n";
// Users -------------------
$user = R::dispense('user');
$dynamic_salt = generatePassword(40);
$user->username = 'test';
$user->salt = $dynamic_salt;
$user->hash = md5(sprintf('%s%s%s', Config::get('static.salt'), 'test', $dynamic_salt));
$user->sharedActionList = R::loadAll('action', $action_ids);
R::store($user);

