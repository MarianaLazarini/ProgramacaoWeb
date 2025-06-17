import { useEffect, useState } from "react";
import axiosClient from "../../axiosClient";
import { Link } from "react-router-dom";

export default function UserIndex() {
  const [usuarios, setUsuarios] = useState([]);

  useEffect(() => {
    axiosClient.get("/user/index")
      .then((res) => {
        setUsuarios(res.data);
      })
      .catch((err) => {
        console.error("Erro ao carregar usuários:", err);
        alert("Erro ao carregar usuários. Verifique autenticação.");
      });
  }, []);

  const handleDelete = (id) => {
    if (window.confirm("Deseja realmente excluir este usuário?")) {
      axiosClient.delete(`/user/destroy/${id}`)
        .then(() => {
          setUsuarios(usuarios.filter((u) => u.id !== id));
        })
        .catch((err) => {
          console.error("Erro ao excluir:", err);
          alert("Erro ao excluir usuário.");
        });
    }
  };

  return (
    <section style={{ padding: "2rem", maxWidth: "800px", margin: "0 auto" }}>
      <h1>Usuários Registrados</h1>
      <Link to="/user/store" style={{ textDecoration: "none", marginBottom: "1rem", display: "inline-block" }}>
        ➕ Novo Usuário
      </Link>
      {usuarios.length === 0 ? (
        <p>Nenhum usuário encontrado.</p>
      ) : (
        <table border="1" width="100%" cellPadding="8">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {usuarios.map((user) => (
              <tr key={user.id}>
                <td>{user.id}</td>
                <td>{user.name}</td>
                <td>{user.email}</td>
                <td>
                  <Link to={`/user/update/${user.id}`}>Editar</Link> |{" "}
                  <button onClick={() => handleDelete(user.id)}>Excluir</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
    </section>
  );
}
