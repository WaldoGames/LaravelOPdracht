<!DOCTYPE html>                                                      <!-- selecteer.php  --> 
<html lang="nl"> 
<head>                                                                         <!-- VIEW --> 
  <meta charset="UTF-8"> 
  <title>Temperaturen</title> 
</head> 
<body> 


            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

  <form action="overzicht" method="get"> 
      Maand: <select name="maand"> 
      <option value="1">Januari</option> 
      <option value="2">Februari</option> 
      <option value="3">Maart</option> 
      <option value="4">April</option> 
      </select> 
      <button type="submit">Overzicht</button> 
  </form> 
</body> 
</html>