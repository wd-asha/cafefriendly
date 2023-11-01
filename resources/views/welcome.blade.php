@extends('layouts.app')
@section('content')

<div class="first-section" id="start">
    <h1>
        <span>домашний</span>
        <span>картофель фри</span>
        <span>мировая</span>
        <span>кухня</span>
    </h1>
</div>

<div class="second-section">
    <div class="second-flex">
        <div class="second-item">
            <!--<h2>
                <span>Готовся</span>
                <span>ко взлету</span>
            </h2>-->
            <img src="{{asset('images/cafe2-min.jpg')}}" alt="">
        </div>
        <div class="second-item">
            <h2><span>Готовся ко взлету</span></h2>
            <p class="content">
                Friendly Cafe- это кулинарное путешествие во все уголки мира. Позвольте себе увлечься разнообразием вкусов и цветов, предлагаемых в меню.<br><br>Friendly Cafe, приготовленный из сырых и тщательно отобранных продуктов, представляет собой пересмотр лучших классических блюд мировой кухни, включая хороший домашний картофель фри.
            </p>
        </div>
    </div>
</div>

<div class="third-section" id="thirdSection">
    <h2 class="third-item" id="thirdItem">
        <span>исследовать мир</span>
        <span>без путишествий</span>
        <span>это возможно</span>
        <span>с friendly cafe</span>
    </h2>
</div>

<div class="four-section">
    <div class="four-grid">
        <div class="four-grid-item">
            <div class="illustration">
                <img src="{{asset('images/photo-1-min.jpg')}}" alt="">
            </div>
        </div>
        <div class="four-grid-item">
            <div class="illustration">
                <img src="{{asset('images/photo-2-min.jpg')}}" alt="">
            </div>
        </div>
        <div class="four-grid-item">
            <div class="illustration">
                <img src="{{asset('images/photo-3-min.jpg')}}" alt="">
            </div>
        </div>
        <div class="four-grid-item">
            <div class="illustration">
                <img src="{{asset('images/photo-4-min.jpg')}}" alt="">
            </div>
        </div>
        <div class="four-grid-item">
            <div class="illustration">
                <img src="{{asset('images/photo-5-min.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="five-section" id="byway">
    <div class="five-flex">
        <div class="five-item">
            <img src="{{asset('images/cafe5-min.jpg')}}" alt="">
        </div>
        <div class="five-item">
            <p class="content">
                Поскольку наша концепция уникальна, уникальны и наши блюда.<br><br>Наше меню - результат многолетней работы, от сочетания специй до создания кремовых соусов, шеф-повар пересмотрел величайшие классические блюда мировой кухни, чтобы заставят вас открыть для себя сочетание уникальных вкусов и текстур.<br><br>Каждое утро наши команды заранее готовят ингредиенты, которые будут использоваться в течение дня: замариновать мясо, нарезать травы, очистить овощи, раздавить сухофрукты, измельчить авокадо, прежде чем готовить небольшое количество в течение всего дня.<br><br>Friendly Cafe предлагает исключительные кулинарные впечатления, которые удовлетворят самых больших энтузиастов еды и путешествий.
            </p>
        </div>
    </div>
</div>

<div class="sex-section" id="menu">
    <div class="sex-section-title">
        <h2>
            <span>Авторские</span>
            <span>творения</span>
        </h2>
    </div>
    <div class="sex-grid">
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-6-min.png')}}" alt="">
            <h4>Индийский</h4>
            <p>Вкусные куриные шашлычки тандури на гриле, подаются со сливочно-сливочным куриным соусом, орехами кешью и майонезом-карри</p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-7-min.png')}}" alt="">
            <h4>Британский</h4>
            <p>Филе трески в стиле темпура с домашним соусом тартар, свежими побегами зеленого горошка и слегка мятным вкусом</p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-8-min.png')}}" alt="">
            <h4>Ливанский</h4>
            <p>Восхитительные домашние фалафели для двойного таяния и хрустящей текстуры в сопровождении двух вкусных традиционных ливанских соусов</p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-9-min.png')}}" alt="">
            <h4>Турецкий</h4>
            <p>Шашлык, приготовленный в стиле адана, чтобы насладиться двумя традиционными домашними соусами, чачик (цацики) и баба ганудж (икра из баклажанов)</p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-10-min.png')}}" alt="">
            <h4>Африканский</h4>
            <p>Вкусные кусочки курицы, сваренные на медленном огне в соусе мафе, идеально сочетают сладкое и соленое. Вас ждут подорожники, зеленый соус и арахисовое масло</p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-11-min.png')}}" alt="">
            <h4>Французский</h4>
            <p>По принципу неструктурированного кордона блю присутствуют все элементы настоящего самодельного кордона блю. Эмменталь, включая бекон, сливочный бешамель и мясо птицы. Все есть. </p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-13-min.png')}}" alt="">
            <h4>Фламанд</h4>
            <p>Нежные и щедрые куски говядины, тушенные в традиционном фламандском карбонаде с имбирным пряником. С картофелем фри вас ждет домашний майонез</p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-14-min.png')}}" alt="">
            <h4>Ла буррата</h4>
            <p>Салат, приготовленный исключительно из свежих продуктов, имеет много разных вкусов и текстур. Сливочная буррата, домашний зеленый песто и засахаренные помидоры</p>
        </div>
        <div class="sex-grid-item">
            <img src="{{asset('images/photo-15-min.png')}}" alt="">
            <h4>Мексиканский</h4>
            <p>Chili con carne, приготовленный по традиционному мексиканскому рецепту, подается с порцией домашнего гуакамоле, начос и соусом сальса кесо</p>
        </div>
    </div>
</div>

<div class="seven-section" id="cafe">
    <div class="seven-grid">
        <div class="seven-grid-item">
            <h2>
                <span>Желаете</span>
                <span>путишествовать?</span>
            </h2>
        </div>
        <div class="seven-grid-item">
            <p><a href="{{ route('shop') }}" class="order-link">Заказать</a></p>
        </div>
        <div class="seven-grid-item">
            <p>+7 (351) 211‒34‒14<br><br>Челябинск<br><br>пр. Ленина, 61</p>
        </div>
        <div class="seven-grid-item">
            <a href="#">Посмотреть на Google Maps</a>
        </div>
    </div>
</div>

@endsection