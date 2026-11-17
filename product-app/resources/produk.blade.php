        @media(max-width:800px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.nav{justify-content:center}}
        @media(max-width:540px){.grid{grid-template-columns:1fr}.picture{height:190px}nav{justify-content:center;gap:12px}}
    </style>
</head>
<body>
<header>
    <div class="nav">
        <a class="logo" href="/">Style<span>Mart</span></a>
        <nav>
            <a href="/">Beranda</a>
            <a class="active" href="/produk">Produk</a>
            <a href="/kategori">Kategori</a>
            <a href="/promo">Promo</a>
            <a href="/tentang">Tentang</a>
            <a href="/kontak">Kontak</a>
            <a href="/keranjang">Keranjang 🛒</a>
        </nav>
    </div>
</header>

<section class="hero">
    <h1>Koleksi Produk StyleMart</h1>
    <p>Temukan gaya favoritmu dengan harga yang bersahabat.</p>
</section>

<main>
    <div class="toolbar">
        <input type="search" id="search" placeholder="Cari nama produk..." aria-label="Cari produk">
        <select id="category" aria-label="Pilih kategori">
            <option value="semua">Semua Kategori</option>
            <option value="pakaian">Pakaian</option>
            <option value="sepatu">Sepatu</option>
            <option value="tas">Tas</option>
            <option value="aksesori">Aksesori</option>
        </select>
        <select id="sort" aria-label="Urutkan produk">
            <option value="default">Urutkan Produk</option>
            <option value="low">Harga Terendah</option>
            <option value="high">Harga Tertinggi</option>
        </select>
    </div>

    <```html
<div class="grid" id="products">

    <article class="card" data-name="dress floral wanita" data-category="pakaian" data-price="150000">
        <div class="picture">👗</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Dress Floral Wanita</h3>
            <p class="desc">Dress cantik dengan motif bunga untuk acara santai.</p>
            <div class="price-row">
                <span class="price">Rp150.000</span>
                <button onclick="addToCart('Dress Floral Wanita',150000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="blouse wanita" data-category="pakaian" data-price="95000">
        <div class="picture">👚</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Blouse Wanita</h3>
            <p class="desc">Blouse elegan dan nyaman digunakan sehari-hari.</p>
            <div class="price-row">
                <span class="price">Rp95.000</span>
                <button onclick="addToCart('Blouse Wanita',95000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="celana jeans wanita" data-category="pakaian" data-price="130000">
        <div class="picture">👖</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Celana Jeans</h3>
            <p class="desc">Celana jeans dengan desain modern dan simpel.</p>
            <div class="price-row">
                <span class="price">Rp130.000</span>
                <button onclick="addToCart('Celana Jeans',130000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="kaos polo pria" data-category="pakaian" data-price="85000">
        <div class="picture">👕</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Kaos Polo Pria</h3>
            <p class="desc">Kaos polo keren untuk aktivitas sehari-hari.</p>
            <div class="price-row">
                <span class="price">Rp85.000</span>
                <button onclick="addToCart('Kaos Polo Pria',85000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="cardigan wanita" data-category="pakaian" data-price="110000">
        <div class="picture">🧥</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Cardigan Wanita</h3>
            <p class="desc">Cardigan lembut dengan tampilan stylish.</p>
            <div class="price-row">
                <span class="price">Rp110.000</span>
                <button onclick="addToCart('Cardigan Wanita',110000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="kemeja pria" data-category="pakaian" data-price="120000">
        <div class="picture">👔</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Kemeja Pria</h3>
            <p class="desc">Kemeja casual untuk tampilan rapi dan modern.</p>
            <div class="price-row">
                <span class="price">Rp120.000</span>
                <button onclick="addToCart('Kemeja Pria',120000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="rok plisket wanita" data-category="pakaian" data-price="90000">
        <div class="picture">👗</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Rok Plisket</h3>
            <p class="desc">Rok plisket anggun untuk gaya sehari-hari.</p>
            <div class="price-row">
                <span class="price">Rp90.000</span>
                <button onclick="addToCart('Rok Plisket',90000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="hoodie oversized" data-category="pakaian" data-price="145000">
        <div class="picture">🧥</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Hoodie Oversized</h3>
            <p class="desc">Hoodie casual dengan desain kekinian.</p>
            <div class="price-row">
                <span class="price">Rp145.000</span>
                <button onclick="addToCart('Hoodie Oversized',145000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="tunik wanita" data-category="pakaian" data-price="125000">
        <div class="picture">👚</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Tunik Wanita</h3>
            <p class="desc">Tunik simpel dengan model yang elegan.</p>
            <div class="price-row">
                <span class="price">Rp125.000</span>
                <button onclick="addToCart('Tunik Wanita',125000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <article class="card" data-name="celana cargo pria" data-category="pakaian" data-price="135000">
        <div class="picture">👖</div>
        <div class="info">
            <span class="tag">PAKAIAN</span>
            <h3>Celana Cargo Pria</h3>
            <p class="desc">Celana cargo casual dengan banyak kantong.</p>
            <div class="price-row">
                <span class="price">Rp135.000</span>
                <button onclick="addToCart('Celana Cargo Pria',135000)">+ Keranjang</button>
            </div>
        </div>
    </article>

    <div class="empty" id="empty">
        Produk tidak ditemukan. Coba kata kunci lain.
    </div>

</div>
```
    </div>
</main>

<footer>&copy; 2026 StyleMart. Semua hak dilindungi.</footer>
<script>
    const searchInput = document.getElementById('search');
    const categorySelect = document.getElementById('category');
    const sortSelect = document.getElementById('sort');
    const grid = document.getElementById('products');
    const empty = document.getElementById('empty');

    function filterProducts() {
        const query = searchInput.value.toLowerCase().trim();
        const category = categorySelect.value;
        const cards = Array.from(grid.querySelectorAll('.card'));
        cards.forEach(card => {
            const matchesName = card.dataset.name.includes(query);
            const matchesCategory = category === 'semua' || card.dataset.category === category;
            card.style.display = matchesName && matchesCategory ? '' : 'none';
        });
        const visible = cards.filter(card => card.style.display !== 'none');
        if (sortSelect.value === 'low') visible.sort((a,b) => Number(a.dataset.price)-Number(b.dataset.price));
        if (sortSelect.value === 'high') visible.sort((a,b) => Number(b.dataset.price)-Number(a.dataset.price));
        visible.forEach(card => grid.insertBefore(card, empty));
        empty.style.display = visible.length ? 'none' : 'block';
    }
    searchInput.addEventListener('input', filterProducts);
    categorySelect.addEventListener('change', filterProducts);
    sortSelect.addEventListener('change', filterProducts);

    function addToCart(name, price) {
        let cart = [];
        try { cart = JSON.parse(localStorage.getItem('stylemart_cart') || '[]'); } catch (e) { cart = []; }
        const existing = cart.find(item => item.name === name);
        if (existing) {
            existing.quantity = (Number(existing.quantity) || 1) + 1;
            existing.price = price;
        } else {
            cart.push({name: name, price: price, quantity: 1, addedAt: new Date().toISOString()});
        }
        localStorage.setItem('stylemart_cart', JSON.stringify(cart));
        alert(name + ' berhasil ditambahkan ke keranjang!');
    }
</script>
</body>
</html>
