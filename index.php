<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Percobaan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.min.js"></script>
    <script src="helper.js"></script>
    <script>preview_images()</script>
</head>
<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" class="clearfix">
            <div class="uploadWrap">
				<div class="span3">
					<div class="inputFileWrap">
						<input type="file" class="inputFile" id="images" name="images[]" onchange="preview_images()" multiple/>
						<label for="file">
							<figure>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
									<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
								</svg>
							</figure>
							<span>Choose a file…</span>
						</label>
					</div>
				</div>
            </div>
            <div class="uploadBtnWrap clearfix">
                <div class="right">
                    <input type="submit" class="uploadBtn" name='submit_image' value="Upload Multiple Image"/>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['submit_image'])){
        $imageArray = array();
        foreach($_FILES['images']['name'] as $key=>$val){
            $uploadfile=$_FILES["images"]["tmp_name"][$key];
		    $folder="gambar_produk/";
            $target_file = $folder.$_FILES['images']['name'][$key];

            if(move_uploaded_file($_FILES["images"]["tmp_name"][$key], "$folder".$_FILES["images"]["name"][$key])){
                $imageArray[] = $target_file;
            }
        }
    }

    if(!empty($imageArray)){
        foreach($imageArray as $src){
            echo "<ul>
                    <li>
                        <img src='$src'>
                    </li>
                </ul>";
        }
    }

?>