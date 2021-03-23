function previewImage(obj)
{
	let fileReader = new FileReader();
	fileReader.onload = (() => {
    document.getElementById('preview').src = fileReader.result;
  });
	fileReader.readAsDataURL(obj.files[0]);
}