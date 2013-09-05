    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width">
    
            <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    
            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/main.css">
            <script src="js/vendor/modernizr-2.6.2.min.js"></script>
            <script src="../js/jquery-1.8.2.min.js"></script>
            <script src="../js/functions.js"></script>
            <script src="../js/index.js"></script>
        </head>
        <body>
            <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->
    
            <!-- Add your site or application content here -->
         <div class="body">
           <header>
           
           <figure id="logo">
                <img src="img/logo.png" alt="logo" height="50" />
             </figure>
           
           <nav id="controlPanel" >
           <ul>
                        <li class="user" ><a href="index.html">Lan Pham Ngoc</a></li>
                        <li ><a href="#">Add Project</a></li>
                        <li  ><a href="#">My projects</a></li>
                        <li><a href="#">Sign out</a></li>
                    </ul>
           </nav>
           
           
           </header>
           
           <nav id="dashboard">      
                      <li class="active" ><a href="#">Dashboard</a></li>
                        <li ><a href="#">Helpdesk</a></li>
                        <li><a href="#">Contact</a></li>
           </nav>
           
           <div id="mainContent">
           
      
           
           <nav id="headingNav">
                        <li ><a href="#">Show</a></li>
                        <li class="active" ><a href="#">All</a></li>
                        <li><a href="#">Active</a></li>
                        <li><a href="#">Archived</a></li>
           </nav>
           
          <table id="mainTable">
              <thead>
                  <tr>
                      <th >No</th>
                      <th  >Project names</th>
                      <th  >Diary numbers</th>
                      <th  >Identifiers</th>
                      <th >Time created</th>
                      <th >Time modified</th>
                      <th  >Status</th>
                  </tr>
              </thead>
              
              <tbody id="tbody">
               
                  
              </tbody>
          </table>
          
          <nav id="Pagination" >
          	<a href="#" >Previous</a>
            <a class="active" href="#" >1</a>
            <a href="#" >2</a>
            <span>...</span>
            <a href="#" >19</a>
            <a href="#" >20</a>
            <a href="#" >Next</a>
           </nav>
           
           <div class="pagination-amount" >
           <form id="paginationForm" action="" method="post" >Show 
            <input type="hidden" name="paginationForm">
            	<select name="paginationCount">
            		<option value="10" selected ="selected">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    items per page
                </select>
            </form>
           </div>
        
    
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script>
    
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
            
         </div>
         
            
           <footer>
           <p>Metropolia - Expertise and Insight for the future</p>
           </footer>
        </body>
    </html>
