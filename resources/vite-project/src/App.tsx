import React from 'react';
import './App.css';
import Encabezado from './componentes/Encabezado';
import Register from './componentes/formulario';
import PieDePagina from './componentes/Footer';


function App() {
  const hobbies = ['Leer', 'Jugar videojuegos', 'Viajar', 'Jugar Futbol', 'Ver peliculas'];
  const seriesFavoritas = ['Transformers', 'Piratas del Caribe', 'Dragon Ball', 'Son como niños', 'Aventuras de lana Roades'];
  const videoGracioso = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';

  return (
    <>
    <Encabezado/>
    <Register/>
      <PieDePagina/>
      </>
        
    
  );
}

export default App;
