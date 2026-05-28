import React from "react";

function MovieCard(props) {
  return (
    <div style={{ border: "1px solid black", margin: "10px", padding: "10px" }}>
      <h2>{props.title}</h2>
      <p>Жанр: {props.genre}</p>
      <p>Рейтинг: {props.rating}</p>
    </div>
  );
}

export default MovieCard;