
<div class="header">
        <h1>Shoe-Spot</h1>
        <p>Step into confidence with every pair</p>
      </div>
      
  
      <nav class="sticky-nav">
        <ul>
          
        <li><a href="{{ route(name: 'index') }}">HOME</a></li>
            <li><a href="{{ route(name: 'product') }}">PRODUCTS</a></li>
            <li><a href="{{ route(name: 'about') }}">ABOUT US</a></li>
            <li><a href="{{ route(name: 'contact') }}">CONTACT US</a></li>
            <li><a href="{{ route(name: 'login') }}">LOGIN</a></li>
            <li><a href="{{ route(name: 'register') }}">SIGNUP</a></li>
            <li><a href="{{ route(name: 'web.admin') }}">ADMIN</a></li>
         
            <li><a href="{{ route(name: 'addtocart') }}"><img class="cardIcon" src="{{ asset('images/card.png') }}" alt=""></a></li>
            <li>
                <form >
                    <input type="text" placeholder="Search..." name="query" aria-label="Search">
                    <button type="submit">Search</button>
                </form>
            </li>
        </ul>
    </nav>