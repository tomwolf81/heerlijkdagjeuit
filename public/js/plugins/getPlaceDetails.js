// Laad de omgeving variabelen
require('dotenv').config();

const axios = require('axios');
const apiKey = process.env.GOOGLE_MAPS_API_KEY;

const getPlaceDetails = async (place) => {
  try {
    const response = await axios.get(`https://maps.googleapis.com/maps/api/place/details/json?key=${apiKey}&placeid=${place}`);
    console.log(response.data);
  } catch (error) {
    console.error(error);
  }
};

// Exporteer de functie voor gebruik in andere bestanden
module.exports = getPlaceDetails;
