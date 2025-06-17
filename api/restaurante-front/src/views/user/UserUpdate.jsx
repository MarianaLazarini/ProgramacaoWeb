import { useEffect, useState } from "react";
import { useParams, useNavigate } from "react-router-dom";
import axiosClient from "../../axiosClient";

export default function UserUpdate() {
  const { id } = useParams(); // ID do usuário a ser editado
  const navigate = useNavigate();

  const [user, setUser] = useState({
    name: "",
    email: ""
  });

  const [error, setError] = useState("");

  useEffect(() => {
    axiosClient.get(`/user/show/${id}`)
      .then((res) => setUser(res.data))
      .catch(() => setError("Erro ao carregar dados do usuário."));
  }, [id]);

  const handleChange = (e) => {
    setUser({ ...user, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    axiosClient.put(`/user/update/${id}`, user)
      .then(() => {
        alert("Usuário atualizado com sucesso!");
        navigate("/user/index");
      })
      .catch((err) => {
        console.error(err);
        alert("Erro ao atualizar usuário.");
      });
  };

  return (
    <section style={{ padding: "2rem", maxWidth: "600px", margin: "0 auto" }}>
      <h1>Editar Usuário</h1>

      {error && <p style={{ color: "red" }}>{error}</p>}

      <form onSubmit={handleSubmit}>
        <div style={{ marginBottom: "1rem" }}>
          <label>Nome:</label><br />
          <input
            type="text"
            name="name"
            value={user.name}
            onChange={handleChange}
            required
          />
        </div>

        <div style={{ marginBottom: "1rem" }}>
          <label>Email:</label><br />
          <input
            type="email"
            name="email"
            value={user.email}
            onChange={handleChange}
            required
          />
        </div>

        <button type="submit">Salvar Alterações</button>
      </form>
    </section>
  );
}
