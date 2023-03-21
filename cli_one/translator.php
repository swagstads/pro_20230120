<!DOCTYPE html>
<html>
<head>
	<title>Website Language Translator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
		<h1>Website Language Translator</h1>
		<label for="source-text">Enter text to translate:</label>
		<textarea id="source-text" class="form-control mb-3"></textarea>
		<label for="target-language">Select target language:</label>
		<select id="target-language" class="form-control mb-3">
			<option value="ar">Arabic</option>
			<option value="fr">French</option>
			<option value="de">German</option>
			<option value="it">Italian</option>
			<option value="ja">Japanese</option>
			<option value="ko">Korean</option>
			<option value="pt">Portuguese</option>
            <option value="ru">Russian</option>
            <option value="es">Spanish</option>
            <option value="zh-CN">Chinese (Simplified)</option>
        </select>
            <button id="translate-button" class="btn btn-primary mb-3">Translate</button>
            <h3>Translated Text:</h3>
            <p id="target-text"></p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mozilla/readability@0.7.1/dist/readability.js"></script>
    <script>
        $(document).ready(function(){
            $("#translate-button").click(function(){
                var sourceText = $("#source-text").val();
                var targetLang = $("#target-language").val();
                var url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=" + targetLang + "&dt=t&q=" + encodeURI(sourceText);
                $.get(url, function(data){
                    var translatedText = data[0][0][0];
                    $("#target-text").text(translatedText);
                });
            });
        });
    </script>
</body>
</html>
