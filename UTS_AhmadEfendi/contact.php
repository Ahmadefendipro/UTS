<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact </title>
    <link rel="stylesheet" type="text/css" href="styles/stylesheet.css"/>
    <a href="#" class="ignielToTop"></a>
</head>
<body>
    <div id="wrapper">
        <div id="banner">
            <h1 style= "text-align: center;
                        color: black;
                        margin-top: 50px;
                        margin-left: 20px;">
                AMobil <br>

            </h1>
        </div>

        <nav id="navigation">
            <ul id="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Exit</a></li>
            </ul>
        </nav>

        <div id="content_contact">
            <fieldset>
                <legend><h2>CONTACT ME</h2></legend>
                    <form action="" method="get">
                        <table border="5" cellpadding="10" align="center" style="text-align: center;">
			                <tr>
				                <td bgcolor="#C68B59"><b>Username : </b></td>
                                <td bgcolor="#C68B59"><input type="textfield" name="username" size="100"></td>
			                </tr>

			                <tr>
				                <td bgcolor="#C68B59"><b>E-Mail : </b></td>
                                <td bgcolor="#C68B59"><input type="textfield" name="email" size="100"></td>
			                </tr>

                            <tr>
				                <td bgcolor="#C68B59"><b>Komentar : </b></td>
                                <td bgcolor="#C68B59"><textarea name="komentar" rows="10" cols="93"></textarea></td>
			                </tr>

			                <tr>
                                <th bgcolor="#C68B59" colspan="2"><input type='submit' name='tombol' value='SUBMIT'/></th>
			                </tr>
		                </table>
                    </form>
                    <br>
            </fieldset>
        </div>
        
        <footer>
            <p>
                <b>&copy; AMobil</b>
                <br>
             
            </p>
        </footer>
    </div>

</body>
</html>