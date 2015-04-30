<!DOCTYPE html>
<html>
	<head>
	    {{ assets.outputCss() }}

		<title>Phalcon PHP Framework</title>
	</head>
	<body>
	{{ partial("partials/navbar") }}
		<div id="main" class="container">
        	    <div id="body">
        		{{ content() }}
        		</div>
        	</div>
	{{ assets.outputJs() }}
	</body>
</html>