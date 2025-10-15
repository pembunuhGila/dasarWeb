$myArray = array();<br>
if (empty($myArray)) { <br>
    echo "Array tidak terdefinisi atau kosong."; <br>
} else { <br>
    echo "Array terdefinisi dan tidak kosong."; <br>
}

if (empty($nonExistentVar)) {
    echo "Variabel tidak terdefinisi atau kosong.";
} else {
    echo "Variabel terdefinisi dan tidak kosong.";
}