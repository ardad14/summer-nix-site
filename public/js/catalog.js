const setBook = async () => {
    let image = document.getElementById("image");
    let author = document.getElementById("author");
    let title = document.getElementById("title");
    let paggination = document.getElementById("container");

    const responce = await fetch("http://server1.com/catalogParse");
    const content = await responce.json();

    content.forEach(item =>
        paggination.innerHTML += `<form action="/product" method="GET">
                    <div class="col mb-5">
                        <div class="products__item">
                            <img class="photo" id="image" src="image/${item.image}" alt="">
                            <h2 id="author">${item.author}</h2>
                            <h1 id="title">${item.title}</h1>
                            <button name="slug" id="slug" type="submit" class="btn btn-dark text-center" value="${item.slug}">
                                Купить за ${item.price} грн
                            </button>
                        </div>

                    </div>
                </form>`
    );
}

setBook();
