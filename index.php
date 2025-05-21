<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>

<body>
    <!-- Responsive navbar-->
    <?php include "navbar.php"; ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/image7.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Vše o vývoji mobilních aplikací</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <hr>
                    <h2>Úvod do vývoje mobilních aplikací</h2>
                    <hr>
                    <p>Vývoj mobilních aplikací je proces tvorby aplikací pro mobilní zařízení. 
                        Tyto aplikace mohou být buď předem nainstalovány na zařízení, nebo jsou dodávány 
                        jako webové aplikace pomocí serverového nebo klientového zpracování (například pomocí JavaScriptu). 
                        Vývoj mobilních aplikací je dynamicky rostoucím a ziskovým odvětvím, které poskytuje mnoho pracovních příležitostí. 
                        Podle analytické zprávy z roku 2013 se odhaduje, že v celé EU je spojeno s vývojem aplikací až 529 tisíc pracovních míst.</p>
                    <p><a href="https://www.statista.com/statistics/271644/worldwide-free-and-paid-mobile-app-store-downloads/">Zde můžete vidět 
                        některé grafy ukazující růst popularity těchto aplikací.</a></p>
                    <a href="#!"><img class="img-fluid" src="assets/img/image4.jpg"></a>
                    <span class="caption text-muted">Frekvence otevírání mobilních aplikací denně</span>
                    <br>
                    <br>
                    <p>Mobilní aplikace se skládá z front-endu, který zahrnuje uživatelské rozhraní (UI), a back-endu, 
                        který se stará o směrování dat, zabezpečení, ověřování, autorizaci, offline práci a plánování služeb. 
                        Pro podporu této funkcionality se využívají různé komponenty middleware, jako je server mobilní aplikace, 
                        mobilní back-end jako služba (MBaaS) a architektury orientované na služby (SOA).</p>
                        <hr>
                    <h2>Postupy ve vývoji mobilních aplikací</h2>
                    <hr>
                    <p>Existuje mnoho způsobů vývojů mobilních aplikací.
                    <h5>Mezi tyto způsoby patří:</h5>
                    <b>Waterfall (Vodopádový model)</b> - Vodopádový přístup k vývoji projektů je charakterizován důrazem na plánování, 
                    dodržování termínů a postupné provádění jednotlivých fází projektu. Tento přístup je vhodný pro projekty, které mají 
                    jasně definované cíle a rozdělení prací. Vodopádový model se řídí pevným plánem a minimálně připouští změny v průběhu 
                    realizace projektu. Je často podporován použitím nástrojů, jako je Ganttův diagram, který pomáhá s plánováním času a 
                    sledováním pokroku. Vodopádový přístup se liší od agilních přístupů, které jsou více flexibilní a vhodnější pro projekty, 
                    které vyžadují inovace a upřesňování během vývoje.<br>
                    <br>
                    <b>Agile</b> - Agilní vývoj vznikl jako odpověď na problémy, kterým čelil tradiční vodopádový model vývoje. Vodopádový 
                    model byl pevně strukturovaný a nedokázal efektivně reagovat na změny v průběhu vývoje. V roce 2001 byl vytvořen Agilní 
                    manifest, který definuje nový přístup k vývoji softwaru.<br>
                    <p>Agilní vývoj klade důraz na těsnou spolupráci mezi vývojovým týmem a zákazníkem. Jeho základem jsou různé metodiky, 
                        jako je Scrum, XP, FDD, Lean Development, TDD, Crystal a další. </p>
                        <p>Důležitou součástí agilního vývoje jsou také denní stand-up meetingy, během kterých členové týmu sdělují svůj pokrok, 
                            překážky a plány na následující období. Agilní přístup umožňuje pružně reagovat na požadavky zákazníka a upřednostňuje 
                            iterativní vývoj a časté zpětné vazby. Tím umožňuje vývojovému týmu lépe se přizpůsobit měnícím se podmínkám a dosáhnout lepších výsledků.</p>
                        <p>V rámci agilního vývoje je první fáze nazývána "nultý sprint" a zaměřuje se na důkladnou analýzu projektu. Během této fáze jsou 
                            identifikovány a rozčleněny jednotlivé funkcionality, obrazovky a činnosti do bloků, které jsou zapsány do Product Backlogu. 
                            Po analýze následuje plánování sprintů, přičemž jejich počet závisí na velikosti projektu. Každý sprint je zaměřen na dokončení 
                            určité definované části softwaru, která je spojená s konkrétními úkoly ze zapsaného Backlogu. Po dokončení dané části je představena 
                            zákazníkovi, který poskytuje zpětnou vazbu a může navrhnout požadavky na změny. </p>
                        <p>Agilní přístup umožňuje rychle reagovat na požadavky zákazníka, a tyto změny a úpravy se integrují do následujícího sprintu. 
                            Tím se minimalizuje dopad na celý systém ve srovnání s tradičním vodopádovým přístupem. Pokud je přijatý sprint schválen zákazníkem, 
                            následuje další sprint, kde se vytváří další část softwaru. Tento cyklus se opakuje až do dokončení projektu a nasazení finální verze.</p>
                        <p>Efektivní agilní vývoj vyžaduje pevnou spolupráci mezi klientem a vývojovým týmem. Avšak, mnozí klienti nemají dostatek času na pravidelné 
                            konzultace a kontrolu projektu, což může zpomalit postup a vést ke zpožděním. Je proto důležité před zahájením projektu pečlivě plánovat 
                            spolupráci a zajistit, že obě strany jsou se způsobem komunikace plně seznámeny. Výběr odpovědného zástupce klienta, který se bude aktivně 
                            podílet na projektu a bude mít dostatek času, je klíčový. </p>
                    <b>Scrum</b> - Scrum je široce využívaná implementace agilní metodiky, která se zaměřuje na iterativní vývoj a efektivní řízení projektu. 
                    Tato metodika klade důraz na pravidelnou komunikaci jak v rámci týmu, tak i mezi týmem a klientem.<br>
                    <p>Díky své flexibilitě a adaptabilitě je Scrum oblíbeným řešením pro různé typy týmů, včetně menších týmů. Je to efektivní přístup, 
                        který umožňuje pružné reagování na změny a přizpůsobení se potřebám projektu.
                        Tento přístup klade důraz na důvěru, jednotu, spolupráci a individuální schopnosti členů týmu.</p>
                        <p>V rámci Scrumu má každý člen týmu specifickou roli, která zahrnuje určité typy úkolů. Správná implementace Scrumu v týmu umožňuje vytvářet 
                            úspěšné produkty s přidanou hodnotou.</p>
                        <p>Díky iterativnímu a inkrementálnímu přístupu Scrum umožňuje rychle reagovat na problémy během vývoje. Tým také pravidelně získává zpětnou vazbu od 
                            klienta nebo reálných uživatelů.</p>
                        <p>Komunikace hraje v metodě Scrum klíčovou roli, nejen v rámci týmu, ale také mezi týmem a zadavatelem, například při vývoji mobilní aplikace. 
                            Zadavatel získává větší flexibilitu při rozhodování o směru vývoje aplikace, a vývojáři mohou pružně reagovat na technické výzvy bez překračování termínů.</p>
                        <p>Výhodou Scrumu je, že po každém sprintu je k dispozici funkční část produktu. To umožňuje zákazníkovi poskytnout zpětnou vazbu a ovlivnit další směřování vývoje.</p>
                        <p>Konec sprintu je také příležitostí k hodnocení práce a hledání prostoru pro zlepšení a zefektivnění procesů.</p>
                        <p>Celkově lze říci, že Scrum je agilní metodika, která přináší efektivitu, adaptabilitu a důraz na spolupráci a komunikaci při vývoji digitálních produktů.</p>
                    <b>Další postupy</b> - Další postupy a metodologie zahrnují Lean, Kanban, Extreme Programming (XP) a další. Výběr správného postupu závisí na specifických potřebách projektu, 
                    velikosti týmu a požadavcích zákazníka.<br>
                   <br>
                   <br>
                </div>
            </div>
        </div>
    </main>
    <?php include "topButton.php"; ?>
</body>

</html>