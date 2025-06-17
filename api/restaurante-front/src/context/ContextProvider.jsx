import { createContext, useContext, useState } from "react";

const AuthContext = createContext();

export function ContextProvider({ children }) {
  const [user, setUser] = useState(null);
  const [token, setToken] = useState(localStorage.getItem("TOKEN") || null);

  const _setUser = (user) => {
    setUser(user);
  };

  const _setToken = (token) => {
    setToken(token);
    if (token) {
      localStorage.setItem("TOKEN", token);
    } else {
      localStorage.removeItem("TOKEN");
    }
  };

  return (
    <AuthContext.Provider value={{ user, token, _setUser, _setToken }}>
      {children}
    </AuthContext.Provider>
  );
}

export const useLogin = () => useContext(AuthContext);
