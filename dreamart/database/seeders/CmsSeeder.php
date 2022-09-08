<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms')->insert([
            'id' => 1,
            'title' => 'Quem Somos',
            'title_en' => 'Who we are',
            'text' => '
            <p>O dream art streaming foi criado para quem ama jiu-jitsu. Atletas e fãs encontram na plataforma uma experiência única e personalizável para estar mais perto do esporte, ao lado dos melhores e mais criativos profissionais!</p>
            <p>Depois de estudar a fundo o que o mercado oferece, desenvolvemos um espaço amplo e rico, no qual você encontra uma grande variedade de histórias, jogos, personalidades e faixas para ver e aprender jiu-jitsu.</p>
            <p>O projeto dream art project nasceu do sonho de realizar sonhos em 2019. Acompanhamos a trajetória de jovens atletas de jiu-jitsu que são selecionados por já ter uma carreira de muitas experiências, e precisam de acompanhamento para que se tornem grandes profissionais. São, hoje, mais de 40 atletas entre eles 12 meninas focados em competição e capacitação simultânea (acadêmica e profissional).</p>  
            <p>Nossa equipe é formada 100% com foco em competição, sendo umas das únicas do brasil e do mundo todo com esse formato. Juntos, já viajamos para mais de 10 países em prol de disputar as melhores e maiores competições do mundo.  Além de oferecer moradia gratuita, alimentação, kimonos e outros materiais necessários para que se desenvolva seu lado profissional e pessoal da melhor forma. Para manter o projeto, contamos com o apoio de empresas que acreditam e apostam no crescimento desse sonho junto conosco.  Faça parte de um universo ainda maior do jiu-jitsu! Sua assinatura ajuda a manter ativo um hub de transformação.</p>
            ',
            'text_en' => '
            <p>Dreamart was created for those who love jiu-jitsu. Athletes and fans find on the platform a unique and customizable experience to be closer to the sport, alongside the best and most creative professionals!</p>
            <p>After studying in depth what the market offers, we developed a vast and rich space in which you will find a wide variety of stories, games, personalities, and banners to watch and learn jiu-jitsu.</p>
            <p>The dream art project was born from the dream of making dreams come true in 2019. We follow the trajectory of young jiu-jitsu athletes selected because they already have a career of many experiences and need follow-up to become great professionals. Today, there are more than 40 athletes, including 12 girls focused on competition and simultaneous training (academic and professional).</p>
            <p>We are a team 100% focused on the competition, being one of the only ones in Brazil and around the world with this format. Together, we have traveled to more than ten countries to compete in the best and biggest competitions in the world. You will find free housing, food, kimonos, and other materials necessary for you to develop your professional and personal side in the best way. We count on the support of companies to maintain the project and growth of this dream together with us. Be part of an even bigger universe of jiu-jitsu! Your subscription helps keep a transformation hub active.</p>
            '
        ]);


        DB::table('cms')->insert([
            'id' => 2,
            'title' => 'Texto Legal',
            'title_en' => 'Legal',
            'text' => '
            <h3>Compromisso do Usuário</h3>
            <p>O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o oferece no site e com caráter enunciativo, mas não limitativo:</p>
            <p>A) Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;<br/>
            B) Não difundir propaganda ou conteúdo de natureza racista, xenofóbica, ou apostas desportivas (ex.: Moosh), jogos de sorte e azar, qualquer tipo de pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;<br/>
            C) Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do , de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.
            </p>

            <h3>Mais informações</h3>
            <p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos que você usa em nosso site.</p>
            <p>Esta política é efetiva a partir de Setembro de 2022. </p>
            ',
            'text_en' => "
            <h3>User Commitment</h3>
            <p>The user undertakes to make adequate use of the contents and information offered on the website and with an enunciative but not limiting character:</p>
            <p>A) Not to engage in activities that are illegal or contrary to good faith and public order;<br/>
            B) Not to spread propaganda or content of a racist, xenophobic nature, or sports betting (eg, Moosh), games of chance, or any type of illegal pornography in support of terrorism or against human rights;<br/>
            C) Not to cause damage to the physical (hardware) and logical (software) systems of, its suppliers or third parties, to introduce or spread computer viruses or any other hardware or software systems that are capable of causing damages mentioned above.
            </p>

            <h3>More information</h3>
            <p>Hopefully, this is clear, and, as mentioned earlier, if there's something you're not sure you need or not, it's generally safer to leave cookies enabled if it interacts with one of the features you use on our site.</p> 
            <p>This policy is effective as of September 2022. </p>
            "
        ]);


        DB::table('cms')->insert([
            'id' => 3,
            'title' => 'Política de Privacidade',
            'title_en' => 'Privacy Policy',
            'text' => '
            <p>A sua privacidade é importante para nós. É política do respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site , e outros sites que possuímos e operamos.</p>
            <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.
            <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.</p>
            <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.</p>
            <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.</p>
            <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.</p>
            <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contacto connosco.</p>
            ',
            'text_en' => "
            <p>Your privacy is important to us. It is the policy to respect your privacy regarding any information we may collect from you on the site and other sites we own and operate.</p>
            <p>We only ask for personal information when we need it to provide you with a service. With your knowledge and consent, we do this by fair and lawful means. We will also tell you why we are collecting it and how it will be used.
            <p>We only retain the information collected for as long as necessary to provide the requested service. When we store data, we protect it within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use, or modification.</p>
            <p>We do not share personally identifiable information publicly or with third parties, except as required by law.</p>
            <p>Our website may have links to external websites that we do not operate. Please be aware that we have no control over the content and practices of these sites and cannot accept responsibility for their respective privacy policies.</p>
            <p>You are free to decline our request for personal information, understanding that we may not be able to provide some of the services you require.</p>
            <p>Continued use of our site will be deemed acceptance of our privacy and personal information practices. If you have any questions about how we handle user data and personal information, don't hesitate to get in touch with us.</p>
            "
        ]);



        DB::table('cms')->insert([
            'id' => 4,
            'title' => 'Cookies',
            'title_en' => 'Cookies',
            'text' => "
                <h3>O que são cookies?</h3>
                
                <p>Como é prática comum em quase todos os sites profissionais, este site usa cookies, que são pequenos 
                arquivos baixados no seu computador, para melhorar sua experiência. Esta página descreve quais informações 
                eles coletam, como as usamos e por que às vezes precisamos armazenar esses cookies. 
                Também compartilharemos como você pode impedir que esses cookies sejam armazenados, no entanto, 
                isso pode fazer o downgrade ou 'quebrar' certos elementos da funcionalidade do site.</p>
                <h3>Como usamos os cookies?</h3>
                <p>Utilizamos cookies por vários motivos, detalhados abaixo. Infelizmente, na maioria dos casos, 
                não existem opções padrão do setor para desativar os cookies sem desativar completamente a funcionalidade 
                e os recursos que eles adicionam a este site. É recomendável que você deixe todos os cookies se não tiver 
                certeza se precisa ou não deles, caso sejam usado para fornecer um serviço que você usa.</p>
                <h3>Desativar cookies</h3>
                <p>Você pode impedir a configuração de cookies ajustando as configurações do seu navegador (consulte a Ajuda do
                 navegador para saber como fazer isso). Esteja ciente de que a desativação de cookies afetará a funcionalidade 
                 deste e de muitos outros sites que você visita. A desativação de cookies geralmente resultará na desativação de 
                 determinadas funcionalidades e recursos deste site. Portanto, é recomendável que você não desative os cookies.</p>
                 <h3>Cookies que definimos</h3>
                 <ul>
                    <li>Cookies relacionados à conta<br><br/><br/>
                    Se você criar uma conta connosco, usaremos cookies para o 
                    gerenciamento do processo de inscrição e administração geral. Esses cookies geralmente serão excluídos 
                    quando você sair do sistema, porém, em alguns casos, eles poderão permanecer posteriormente para lembrar 
                    as preferências do seu site ao sair.<br><br></li>
                    <li>Cookies relacionados ao login<br><br> 
                    Utilizamos cookies quando você está logado, para que possamos lembrar dessa ação. 
                    Isso evita que você precise fazer login sempre que visitar uma nova página.
                    Esses cookies são normalmente removidos ou limpos quando você efetua logout para garantir que você 
                    possa acessar apenas a recursos e áreas restritas ao efetuar login.<br><br> </li>
                    <li> Cookies relacionados a boletins por e-mail<br><br> 
                    Este site oferece serviços de assinatura de boletim informativo ou e-mail e os cookies podem ser usado 
                    para lembrar se você já está registrado e se deve mostrar determinadas notificações  válidas apenas para 
                    usuários inscritos / não inscritos.<br><br></li>
                    <li>Pedidos processando cookies relacionados<br><br> 
                    Este site oferece facilidades de comércio eletrônico ou pagamento e alguns cookies são essenciais para 
                    garantir que seu pedido seja lembrado entre as páginas, para que possamos processá-lo adequadamente.<br><br></li>
                    <li>Cookies relacionados a pesquisas<br><br> 
                    Periodicamente, oferecemos pesquisas e questionários para fornecer informações interessantes, 
                    ferramentas úteis ou para entender nossa base de usuários com mais precisão. 
                    Essas pesquisas podem usar cookies para lembrar quem já participou numa pesquisa ou para 
                    fornecer resultados precisos após a alteração das páginas.<br><br></li>
                    <li>Cookies relacionados a formulários<br><br> 
                    Quando você envia dados por meio de um formulário como os encontrados nas páginas de contacto 
                    ou nos formulários de comentários, os cookies podem ser configurados para lembrar os detalhes 
                    do usuário para correspondência futura.<br><br></li> 
                    <li>Cookies de preferências do site<br><br> 
                    Para proporcionar uma ótima experiência neste site, fornecemos a funcionalidade para 
                    definir suas preferências de como esse site é executado quando você o usa. Para lembrar 
                    suas preferências, precisamos definir cookies para que essas informações possam ser chamadas 
                    sempre que você interagir com uma página for afetada por suas preferências.<br> </li> 
                </ul>                    
                <h3>Cookies de Terceiros</h3>
                <p>Em alguns casos especiais, também usamos cookies fornecidos por terceiros confiáveis. 
                A seção a seguir detalha quais cookies de terceiros você pode encontrar através deste site.</p>
                <ul>
                    <li>Este site usa o Google Analytics, que é uma das soluções de análise mais difundidas e 
                    confiáveis da Web, para nos ajudar a entender como você usa o site e como podemos melhorar sua 
                    experiência. Esses cookies podem rastrear itens como quanto tempo você gasta no site e as 
                    páginas visitadas, para que possamos continuar produzindo conteúdo atraente.
                    </li>
                </ul>                    
                <p>Para mais informações sobre cookies do Google Analytics, consulte a página oficial do Google 
                Analytics.</p>
                <ul> 
                    <li> As análises de terceiros são usadas para rastrear e medir o uso deste site, para que 
                    possamos continuar produzindo conteúdo atrativo. Esses cookies podem rastrear itens como o 
                    tempo que você passa no site ou as páginas visitadas, o que nos ajuda a entender como podemos 
                    melhorar o site para você.</li>                        
                    <li> Periodicamente, testamos novos recursos e fazemos alterações subtis na maneira como o site 
                    se apresenta. Quando ainda estamos testando novos recursos, esses cookies podem ser usados para 
                    garantir que você receba uma experiência consistente enquanto estiver no site, enquanto
                    entendemos quais otimizações os nossos usuários mais apreciam.</li>                        
                    <li>À medida que vendemos produtos, é importante entendermos as estatísticas sobre quantos 
                    visitantes de nosso site realmente compram e, portanto, esse é o tipo de dados que esses 
                    cookies rastrearão. Isso é importante para você, pois significa que podemos fazer previsões 
                    de negócios com precisão que nos permitem analizar nossos custos de publicidade e produtos 
                    para garantir o melhor preço possível.</li>
                    <li>O serviço Google AdSense que usamos para veicular publicidade usa um cookie DoubleClick 
                    para veicular anúncios mais relevantes em toda a Web e limitar o número de vezes que um 
                    determinado anúncio é exibido para você.<br>  Para mais informações sobre o Google AdSense, 
                    consulte as FAQs oficiais sobre privacidade do Google AdSense.</li>
                    <li>Utilizamos anúncios para compensar os custos de funcionamento deste site e fornecer 
                    financiamento para futuros desenvolvimentos. Os cookies de publicidade comportamental usados 
                    por este site foram projetados para garantir que você forneça os anúncios mais relevantes 
                    sempre que possível, rastreando anonimamente seus interesses e apresentando coisas semelhantes 
                    que possam ser do seu interesse.</li>
                    <li>Vários parceiros anunciam em nosso nome e os cookies de rastreamento de afiliados 
                    simplesmente nos permitem ver se nossos clientes acessaram o site através de um dos sites de 
                    nossos parceiros, para que possamos creditá-los adequadamente e, quando aplicável, permitir 
                    que nossos parceiros afiliados ofereçam qualquer promoção que pode fornecê-lo para fazer uma 
                    compra.</li> 
                </ul> 
            ",
            'text_en' => "
            <h3>What are cookies?</h3>
                
                <p>As is common practice on almost all professional websites, this website uses cookies, and small
                files downloaded to your computer to improve your experience. This page describes what information
                they collect, how we use them, and why we sometimes need to store these cookies.
                We will also share how you can prevent these cookies from being stored, however, this can downgrade or 'break' certain elements of the site's functionality.</p>
                <h3>How do we use cookies?</h3>
                <p>We use cookies for various reasons, detailed below. Unfortunately, in most cases,
                there are no industry standard options to disable cookies without completely disabling the functionality and the features they add to this site. It is recommended that you leave all cookies if you do not have
                sure whether or not you need them if they are used to provide a service you use.</p>
                <h3>Disable cookies</h3>
                <p>You can prevent cookies from being set by adjusting your browser settings (see Help
                 browser for how to do this). Please be aware that disabling cookies will affect functionality
                 this and many other sites you visit. Disabling cookies will generally result in disabling of
                 certain functionality and features of this website. Therefore, it is recommended that you do not disable cookies.</p>
                 <h3>Cookies We Set</h3>
                 <ul>
                    <li>Account-related cookies<br><br/><br/>
                    If you create an account with us, we will use cookies to
                    management of the application process and general administration. These cookies will usually be deleted
                    when you log out of the system, but in some cases they may remain later to remind you
                    your site preferences when you leave.<br><br></li>
                    <li>Cookies related to login<br><br>
                    We use cookies when you are logged in so that we can remember this action.
                    This saves you from having to log in every time you visit a new page.
                    These cookies are normally removed or cleared when you log out to ensure that you
                    can only access restricted resources and areas when logging in.<br><br> </li>
                    <li> Cookies related to email newsletters<br><br>
                    This website offers newsletter or email subscription services and cookies may be used
                    to remind you if you are already registered and whether to show certain notifications that are valid only for
                    subscribed / unsubscribed users.<br><br></li>
                    <li>Orders processing related cookies<br><br>
                    This site offers e-commerce or payment facilities and some cookies are essential to
                    ensure that your order is remembered between pages so that we can process it properly.<br><br></li>
                    <li>Research-related cookies<br><br>
                    From time to time, we offer surveys and questionnaires to provide you with interesting information,
                    useful tools or to understand our user base more accurately.
                    These surveys may use cookies to remember who has already participated in a survey or to
                    provide accurate results after changing pages.<br><br></li>
                    <li>Form-related cookies<br><br>
                    When you submit data through a form such as those found on the contact pages
                    or in the comment forms, cookies can be set to remember the details
                    for future correspondence.<br><br></li>
                    <li>Site Preferences Cookies<br><br>
                    To provide you with a great experience on this site, we provide the functionality to
                    set your preferences for how this website runs when you use it. To remember
                    your preferences, we need to set cookies so that this information can be called
                    whenever you interact with a page you are affected by your preferences.<br> </li>
                </ul>
                <h3>Third Party Cookies</h3>
<p>In some special cases, we also use cookies provided by trusted third parties.
                The following section details which third-party cookies you may encounter through this website.</p>
                <ul>
                    <li>This website uses Google Analytics, which is one of the most widespread and
                    web sites, to help us understand how you use the site and how we can improve your
                    experience. These cookies can track things like how much time you spend on the site and the
                    pages visited, so that we can continue to produce compelling content.
                    </li>
                </ul>
                <p>For more information about Google Analytics cookies, see the official Google page
                Analytics.</p>
                <ul>
                    <li>Third-party analytics are used to track and measure usage of this website, so that
                    we can continue producing compelling content. These cookies can track things like your
                    time you spend on the site or the pages you visit, which helps us understand how we can
                    improve the site for you.</li>
                    <li> Periodically, we test new features and make subtle changes to the way the site
                    presents itself. When we are still testing new features, these cookies may be used to
                    ensure that you receive a consistent experience while on the site, while
                    we understand which optimizations our users appreciate most.</li>
                    <li>As we sell products, it is important that we understand the statistics on how many
                    visitors to our site actually buy and so this is the kind of data these
                    cookies will track. This is important to you as it means we can make predictions
                    accurately that allows us to analyze our advertising and product costs
                    to guarantee the best possible price.</li>
                    <li>The Google AdSense service we use to serve advertising uses a DoubleClick cookie
                    to serve more relevant ads across the web and limit the number of times a
                    particular ad is shown to you.<br> For more information about Google AdSense,
                    see the official AdSense Privacy FAQs.</li>
                    <li>We use advertisements to offset the costs of running this site and to provide
                    funding for future developments. The behavioral advertising cookies used
                    by this site are designed to ensure that you provide the most relevant advertisements
                    whenever possible, anonymously tracking your interests and featuring similar things
                    that may be of interest to you.</li>
                    <li>Various partners advertise on our behalf and affiliate tracking cookies
                    simply allow us to see if our customers accessed the site through one of the
                    our partners so that we can properly credit them and, where applicable, allow
                    that our affiliate partners offer any promotion that may provide you to make a
                    purchase.</li>
                </ul>
            "
        ]);
    }
}
