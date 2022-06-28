function ChangeImage(){

    // get the element
    const image1 = document.getElementById('image1');
    const image2 = document.getElementById('image2');
    const image3 = document.getElementById('image3');
    const image4 = document.getElementById('image4');
    const image5 = document.getElementById('image5');

    // always checking if the element is clicked, if so, do alert('hello')
    image1.addEventListener("click", () => {
        document.getElementById('mainImage').src = '../Images/imagensTeste/laptop.png';
    });

    image2.addEventListener("click", () => {
        document.getElementById('mainImage').src = '../Images/imagensTeste/4.png';
    });

    image3.addEventListener("click", () => {
        document.getElementById('mainImage').src = '../Images/imagensTeste/3.png';
    });

    image4.addEventListener("click", () => {
        document.getElementById('mainImage').src = '../Images/imagensTeste/2.png';
    });

    image5.addEventListener("click", () => {
        document.getElementById('mainImage').src = '../Images/imagensTeste/1.png';
    });

}