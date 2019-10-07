<html>

    <head>

        <title>Neustar</title>
        <!--Here are the dependencies I used to build the project-->
        <script type="text/javascript" src="/neustar/auto_complete.js"></script>        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
    </head>

    <body>
		<table class="table" id="table" style="width:100%">
			<thead class="thead-dark">
			  <tr>
			    <th scope="col">Hostname</th>
			    <th scope="col">IP</th>
			  </tr>
			 </thead>
		 	<tbody>
			  
			<tbody>
		</table>
		</br>
        <form class="form-horizontal">
		    <div class="form-group">
		        <label for="inputHostname" class="col-sm-2 control-label">Hostname</label>
		        <div class="col-sm-10">
		            <input type="text" class="form-control" id="inputHostname" placeholder="Hostname">
		        </div>
		    </div>
		    <div class="form-group">
		        <label for="inputIp" class="col-sm-2 control-label">IP</label>
		        <div class="col-sm-10">
		            <input type="text" class="form-control" id="inputIp" placeholder="IP">
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="col-sm-offset-2 col-sm-10">
		            <button type="button" class="btn btn-dark" onclick="showName()">Submit</button>
		        </div>
		    </div>
		</form>
		<div>
			<span class="d-block p-2 bg-dark text-white">Want to find a DNS/Hostname?</span>
			<form class="form-horizontal">
			    <div class="form-group">
			        <label for="inputDnsSearch" class="">Please write the DNS/Hostname you are looking for</label>
			        <div class="col-sm-10">
			            <input type="text" style="width:20%; margin-bottom: 1%;" class="form-control" id="inputDnsSearch" placeholder="Hostname">
			        </div>
			        <div class="form-group">
			        <div class="col-sm-offset-2 col-sm-10">
			            <button type="button" class="btn btn-dark" onclick="search()">Search</button>
			        </div>
			    </div>
			    </div>
			</form>
			<!--<table class="table" id="tableSearch" style="width:100%">
				<thead class="thead-dark">
				  <tr>
				    <th scope="col">Hostname</th>
				    <th scope="col">IP</th>
				  </tr>
				 </thead>
			 	<tbody>
				  
				<tbody>
			</table>-->

		</div>

    </body>

</html>