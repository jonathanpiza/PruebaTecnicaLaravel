
    <header>
        <form action="/logout">
            <h1>{{__('Welcome')}} {{auth()->user()->name }}</h1>
            <button>{{__('Logout')}}</button>
        </form>
    </header>

    