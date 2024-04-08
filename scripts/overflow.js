import 'tailwindcss-cdn/dist/tailwind.min.css';
import 'alpinejs';

    function swipeCards() {
			  return {
			    cards: [
			      {
			        id: 1,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Cocktail')}`,
			        title: 'Cocktail',
			        description: 'Tropical mix of flavors, perfect for parties.',
			        price: 8.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 2,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Smoothie')}`,
			        title: 'Smoothie',
			        description: 'Refreshing blend of fruits and yogurt.',
			        price: 5.49,
			        link: 'your_link_here'
			      },
			      {
			        id: 3,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Iced Coffee')}`,
			        title: 'Iced Coffee',
			        description: 'Cold brewed coffee with a hint of vanilla.',
			        price: 4.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 4,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Mojito')}`,
			        title: 'Mojito',
			        description: 'Classic Cuban cocktail with mint and lime.',
			        price: 7.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 5,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Matcha Latte')}`,
			        title: 'Matcha Latte',
			        description: 'Creamy green tea latte, rich in antioxidants.',
			        price: 6.49,
			        link: 'your_link_here'
			      },
			      {
			        id: 6,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Fruit Punch')}`,
			        title: 'Fruit Punch',
			        description: 'Sweet and tangy punch, bursting with fruity flavors.',
			        price: 3.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 7,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Bubble Tea')}`,
			        title: 'Bubble Tea',
			        description: 'Chewy tapioca pearls in a sweet milk tea base.',
			        price: 4.99,
			        link: 'your_link_here'
			      }
			    ],
			    addToCart(product) {
			      // Implement your add to cart logic here
			      console.log('Adding to cart:', product);
			    }
			  };
			}