<?php
    print '
    
    
    <head>
    <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
    <div id="sidebar">
        <div class="toggle-btn">
        <span>&#9776</span>
        
        </div>
        <ul>
            <li>Administrar categorias</li>
            <li>######</li>
            <li>######</li>
        
        </ul>
        
        
        
    </div>
    </body>
    
    
    ';


    
    



?>


      <script>
 const btnToggle = document.querySelector('.toggle-btn');
btnToggle.addEventListener('click',function(){
document.getElementById('sidebar').classList.toggle('active');                           
});
        </script>
        