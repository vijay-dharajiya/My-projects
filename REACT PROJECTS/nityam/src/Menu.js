import FoodCard from "./FoodCard";

function Menu() {
  const foods = [
    {
      id: 1,
      name: "Cheese Pizza",
      price: "₹199",
      rating: "4.5",
      image: "https://images.unsplash.com/photo-1594007654729-407eedc4be65"
    },
    {
      id: 2,
      name: "Veg Burger",
      price: "₹99",
      rating: "4.2",
      image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd"
    },
    {
      id: 3,
      name: "White Sauce Pasta",
      price: "₹149",
      rating: "4.4",
      image: "https://images.unsplash.com/photo-1589302168068-964664d93dc0"
    },
    {
    id: 4,
    name: "Grilled Sandwich",
    price: "₹89",
    rating: "4.0",
    image: "https://images.unsplash.com/photo-1551782450-a2132b4ba21d?auto=format&fit=crop&w=800&q=80"
  },
    {
      id: 5,
      name: "French Fries",
      price: "₹79",
      rating: "4.3",
      image: "https://images.unsplash.com/photo-1541592106381-b31e9677c0e5"
    },
    {
      id: 6,
      name: "Cold Coffee",
      price: "₹120",
      rating: "4.6",
      image: "https://images.unsplash.com/photo-1461023058943-07fcbe16d735"
    },
    {
      id: 7,
      name: "Chocolate Shake",
      price: "₹140",
      rating: "4.7",
      image: "https://images.unsplash.com/photo-1572490122747-3968b75cc699"
    },
    {
      id: 8,
      name: "Paneer Tikka",
      price: "₹220",
      rating: "4.5",
      image: "https://images.unsplash.com/photo-1631452180519-c014fe946bc7"
    },
    {
      id: 9,
      name: "Veg Noodles",
      price: "₹130",
      rating: "4.2",
      image: "https://images.unsplash.com/photo-1585032226651-759b368d7246"
    },
    {
      id: 10,
      name: "Ice Cream Sundae",
      price: "₹110",
      rating: "4.6",
      image: "https://images.unsplash.com/photo-1563805042-7684c019e1cb"
    }
  ];

  return (
    <div className="container mt-5">
      <h1 className="text-center fw-bold mb-4">🍽 Our Menu</h1>

      <div className="row">
        {foods.map((item) => (
          <div className="col-md-3 mb-4" key={item.id}>
            <FoodCard {...item} />
          </div>
        ))}
      </div>
    </div>
  );
}

export default Menu;