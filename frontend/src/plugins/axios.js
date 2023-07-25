import axios from "axios";

const instance = axios.create({
  withCredentials: true,
  baseURL: import.meta.env.VITE_APP_API_URL + "/api",
  headers: {
    "Content-Type": "application/json",
  },
});

export default instance;
