const setBook = async () => {
    let pagination = document.getElementById("container");
    let page = document.getElementsByClassName('bg-secondary text-white')[0].getAttribute("value");


    const response = await fetch(`http://server1.com/catalogParse?page=${page}`);
    const content = await response.json();

    content.forEach(item => {
        pagination.innerHTML += `
            <form action="/product" method="GET">
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
    });
}

setBook();
