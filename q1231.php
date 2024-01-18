<?php


 
function encode_number($num) {
    $binary_rep = decbin($num); 
    $encoded_string = str_replace(['0', '1'], ['A', 'B'], $binary_rep);
    return $encoded_string;
} 



function decode_encoded_string($encoded_string) {
    // Replace 'A' with '0' and 'B' with '1' to recover the binary representation
    $binary_rep = str_replace(['A', 'B'], ['0', '1'], $encoded_string);
    
    // Convert the binary representation back to decimal
    $decoded_num = bindec($binary_rep);
    
    return $decoded_num;
}



echo encode_number("")."\n";
