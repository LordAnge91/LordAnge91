function lettersonly (input) {
   let regex = /[^a-z-]/gi;
   input.value = input.value.replace(regex, '');
}
function numbersonly (input) {
   let regex = /[^0-9]/gi;
   input.value = input.value.replace(regex, '');
}
function letterenorm (input) {
   let regex = /[^a-z 0-9]/gi;
   input.value = input.value.replace(regex, '');
}
function indicheck (input) {
   let regex = /[^a-z °0-9]/gi;
   input.value = input.value.replace(regex, '');
}