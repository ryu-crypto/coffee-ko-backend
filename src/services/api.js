// api.js
import axios from "axios";

const api = axios.create({
  baseURL: "http://192.168.100.8:8000", // Laravel API prefix
  timeout: 5000,
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

// Example: login request
export const login = (credentials) => api.post("/login", credentials);

// Example: fetch products
export const getProducts = () => api.get("/products");

// Example: create product
export const createProduct = (data, token) =>
  api.post("/products", data, {
    headers: {
      Authorization: `Bearer ${token}`,
    },
  });

// Example: fetch orders today
export const getOrdersToday = (token) =>
  api.get("/orders/today", {
    headers: {
      Authorization: `Bearer ${token}`,
    },
  });

export default api;
