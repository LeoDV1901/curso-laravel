import React, { useState } from 'react';

const Register: React.FC = () => {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    password: ''
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    
    // Aquí iría la lógica para enviar los datos al servidor
    const response = await fetch('/api/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(formData),
    });

    if (response.ok) {
      // Redirigir o mostrar un mensaje de éxito
      console.log('Registro exitoso');
    } else {
      // Manejar el error
      console.error('Error en el registro');
    }
  };

  return (
    <div>
      <h2>Registro</h2>
      <form onSubmit={handleSubmit}>
        <label htmlFor="name">Nombre:</label>
        <input 
          type="text" 
          name="name" 
          id="name" 
          placeholder="Ingresa tu nombre" 
          value={formData.name} 
          onChange={handleChange} 
          required 
        />

        <label htmlFor="email">Email:</label>
        <input 
          type="email" 
          name="email" 
          id="email" 
          placeholder="Ingresa tu email" 
          value={formData.email} 
          onChange={handleChange} 
          required 
        />

        <label htmlFor="password">Contraseña:</label>
        <input 
          type="password" 
          name="password" 
          id="password" 
          placeholder="Crea una contraseña" 
          value={formData.password} 
          onChange={handleChange} 
          required 
        />

        <button type="submit">Enviar</button>
      </form>
    </div>
  );
};

export default Register;
