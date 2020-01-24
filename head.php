<link href="http://bootstrapk.com/dist/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="http://bootstrapk.com/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
	body {
		margin: 5%;
	}

	.nav{
		float: left;
		padding: 15px;
	}
	.nav:hover{
		background-color: lightgray;
	}
	.nav2{
		text-align: right;
		width: 100%;
	}

	div.content{
		border: 1px lightgray;
		border-radius: 10px;
		column-count: 2;
	}
	.header{
		width: 100%;
		height: 70px;
		text-align: center;
	}

	#chat{
		float: center;
		height: 500px; 
		overflow: auto;
		background-color: #eee;
	}
	.container{
		max-width: 400px;
	}
	.datetime{
		color: gray;
		font-size: 0.6em;
		margin-left: 10px;
	}
	.chatin td{
		padding-left: 7px;
		padding-top: 7px;
	}
	@media screen and (max-width: 300){
		div.content{
			column-count: 1;
		}
	}


	@media screen and (max-width: 500){
		div.content{
			column-count: 2;
		}
	}
	@media screen and (max-width: 700){
		div.content{
			column-count: 3;
		}
	}
	@media screen and (max-width: 900){
		div.content{
			column-count: 4;
		}
	}
</style>