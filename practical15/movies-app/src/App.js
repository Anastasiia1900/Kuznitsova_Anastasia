import './App.css';

import Header from './components/Header';
import MovieCard from './components/MovieCard';
import Footer from './components/Footer';

function App() {
  return (
    <div className="App">
      <Header />

      <MovieCard
        title="Interstellar"
        genre="Sci-Fi"
        rating="8.9"
      />

      <MovieCard
        title="Avatar"
        genre="Fantasy"
        rating="7.8"
      />

      <MovieCard
        title="Joker"
        genre="Drama"
        rating="8.4"
      />

      <Footer />
    </div>
  );
}

export default App;