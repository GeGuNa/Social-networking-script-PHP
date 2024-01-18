<?php


/*
function searchForText($directory, $searchString) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    
    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            if (strpos($content, $searchString) !== false) {
                echo "String '$searchString' found in file: " . $file->getPathname() . "\n";
            }
        }
    }
}


$directory = '/home/phantom/Desktop/all my/my_files/last/script_social/';  

$searchString = 'copy';

searchForText($directory, $searchString);


*/
?>

<script>


async function kekey (){ 
	
	try {
		var qqq =  await fetch("/aba.txt");
		const res = await qqq.text();
		document.writeln(`${res}`)
	} catch(err) {
		console.log(err)
	}
	
}

kekey()

</script>
