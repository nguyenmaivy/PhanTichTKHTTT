function createProduct() {
        var productss = [{
            id: 1,
            status: 1, 
            title: 'Derm Afirm',
            img: './img/products/SanPhamChamSocDa/DermAfirm.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 2,
            status: 1, 
            title: 'Derm Afirm Serum',
            img: './img/products/SanPhamChamSocDa/DermAfirmSerum.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 3,
            status: 1, 
            title: 'DSIUAN',
            img: './img/products/SanPhamChamSocDa/DSIUAN1.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 4,
            status: 1, 
            title: 'DSIUAN',
            img: './img/products/SanPhamChamSocDa/DSIUAN2.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 5,
            status: 1, 
            title: 'DSIUAN',
            img: './img/products/SanPhamChamSocDa/DSIUAN3.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 6,
            status: 1, 
            title: 'DSIUAN',
            img: './img/products/SanPhamChamSocDa/DSIUAN4.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 7,
            status: 1, 
            title: 'DSIUAN',
            img: './img/products/SanPhamChamSocDa/DSIUAN5.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 8,
            status: 1, 
            title: 'LASYA',
            img: './img/products/SanPhamChamSocDa/LASYA1.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 9,
            status: 1, 
            title: 'LASYA',
            img: './img/products/SanPhamChamSocDa/LASYA2.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 10,
            status: 1, 
            title: 'LASYA',
            img: './img/products/SanPhamChamSocDa/LASYA3.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 11,
            status: 1, 
            title: 'LASYA',
            img: './img/products/SanPhamChamSocDa/LASYA4.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 12,
            status: 1, 
            title: 'LAMEILA',
            img: './img/products/SanPhamChamSocDa/LAMEILA.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 13,
            status: 1, 
            title: 'MELAO',
            img: './img/products/SanPhamChamSocDa/MELAOforMen.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 14,
            status: 1, 
            title: 'MenStaySimplicity',
            img: './img/products/SanPhamChamSocDa/MenStaySimplicity.png',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 15,
            status: 1, 
            title: 'SuaTamDove',
            img: './img/products/SanPhamChamSocDa/SuaTamDove.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 16,
            status: 1, 
            title: 'VEZEMenControlOil',
            img: './img/products/SanPhamChamSocDa/VEZEMenControlOil.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 17,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocDa/UltralMen.jpg',
            category: 'Sản phẩm chăm sóc da',
            price: 350000,
            quantity: 15,
        },
        {
            id: 18,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocCoThe/1.jpg',
            category: 'Sản phẩm chăm sóc cơ thể',
            price: 350000,
            quantity: 15,
        },
        {
            id: 19,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocCoThe/Soyraie.jpg',
            category: 'Sản phẩm chăm sóc cơ thể',
            price: 350000,
            quantity: 15,
        },
        {
            id: 20,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocCoThe/2.jpg',
            category: 'Sản phẩm chăm sóc cơ thể',
            price: 350000,
            quantity: 15,
        },
        {
            id: 21,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocCoThe/3.jpg',
            category: 'Sản phẩm chăm sóc cơ thể',
            price: 350000,
            quantity: 15,
        },
        {
            id: 22,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocCoThe/4.jpg',
            category: 'Sản phẩm chăm sóc cơ thể',
            price: 350000,
            quantity: 15,
        },
        {
            id: 23,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocCoThe/5.jpg',
            category: 'Sản phẩm chăm sóc cơ thể',
            price: 350000,
            quantity: 15,
        },
        {
            id: 24,
            status: 1, 
            title: 'UltralMen',
            img: './img/products/SanPhamChamSocCoThe/6.jpg',
            category: 'Sản phẩm chăm sóc cơ thể',
            price: 350000,
            quantity: 15,
        },
        ]
        localStorage.setItem('productss', JSON.stringify(productss));
    }
window.onload = createProduct();

console.log("cmm");
localStorage.setItem('productss', JSON.stringify(productss));