<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expertos</title>
</head>

<body>
    <form name="final" action="estilo.php" method="post">
        <input name="EC" maxlength="12" size="12" type="hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="RO" maxlength="12" size="12" type="hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="CA" maxlength="12" size="12" type="hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="EA" maxlength="12" size="12" type="hidden"><br>

        <input type="hidden" maxlength="3" size="3" name="CAEC">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" maxlength="3" size="3" name="EAOR">&nbsp;<br><br>

        ESTILO&nbsp;&nbsp; <input maxlength="12" size="12" name="ESTILOFINAL">
        <br>
        Escriba su carnet:<input type="Text" name="carnet"><br>
        Sexo:<select name="sex" value="Sexo">
            <option value="f">Femenino</option>
            <option value="m">Masculino</option>
        </select><br>
        Escoja su recinto:<select name="recinto" value="Recinto">
            <option value="p">Paraíso</option>
            <option value="t">Turrialba</option>
        </select><br>
        <font color="#ff0000">
            <font size="4"> -------------------------------------------------</font>
        </font><input value="ENVIAR" type="submit">
    </form>
</body>

</html>