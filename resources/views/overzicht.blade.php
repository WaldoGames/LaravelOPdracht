<!DOCTYPE html>                                       <!-- resources\views\overzicht.php --> 
<html lang='nl'>  
<head>                                                                         <!-- VIEW --> 
  <meta charset='UTF-8'> 
  <title>2010 temperaturen</title> 
  <style> 
    table {border : 1px solid black} 
    td {text-align : right} 
  </style> 
</head> 
<body> 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <?php
  if($maand > 12) $maand=12;
  ?>
  <form action="overzicht" method="get" name="FormM"> 
      Maand: <select name="maand"  onchange="this.form.submit()" > 
      @for ($i = 0; $i <= 12; $i++)
          <option value="{{$i}}" <?php if($maand== $i) echo("selected")?>>{{$maandnamen[$i]}} </option>
          @endfor
      </select> 
      C.<input type="radio" id="TempC" name="typeTemp" value="1" onchange="this.form.submit()"  <?php if($typeTemp==1) echo("checked"); ?>/>
      F.<input type="radio" id="TempF" name="typeTemp" value="2" onchange="this.form.submit()"  <?php if($typeTemp==2) echo("checked"); ?>/>
      </form> 
  <form action="nieuwsbrief" method="post" > <!-- novalidate later uitzetten-->
      @csrf <!-- bescherming tegen CSRF -->
    <label>E-mailadres:</label>
    <input type="email" required name="emailadres"/>
    <button type="submit">Vraag nieuwsbrief aan</button>
    </form>

  <h1>Maand: <?php
  echo $maandnamen[$maand]
 /* if($maand==1) echo "Januari"; 
  if($maand==2) echo "Februari"; 
  if($maand==3) echo "Maart"; 
  if($maand==4) echo "April";  */
   ?></h1> 
  <table> 
    <tr><th>Dag</th><th>Minimum</th><th>Maximum</th></tr> 
    <?php foreach ($metingen as $m) 
      { 
        if(!isset($typeTemp)){
          $typeTemp = 1;
        } 
        $dag = $m->dagnr; 
        $min = $m->minimum; 
        $max = $m->maximum; 
        if($typeTemp == 2){
          $min = (9 * $m->minimum)/5 + 32;
          $max = (9 * $m->maximum)/5 + 32;
          echo "<tr><td>$dag</td><td>$min &deg;F</td><td>$max &deg;F</td></tr>";  
        }else{
          echo "<tr><td>$dag</td><td>$min &deg;C</td><td>$max &deg;C</td></tr>";  
        }

        
      } 
    ?> 
  </table> 
</body> 
</html>