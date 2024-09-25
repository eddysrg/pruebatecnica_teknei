import { pool } from "../db.js";

export const getPersonas = async (req, res) => {
  const { rows } = await pool.query("SELECT * FROM persona");
  res.json(rows);
};

export const createPersona = async (req, res) => {
  try {
    const data = req.body;
    const { rows } = await pool.query(
      "INSERT INTO persona (nombre, edad) VALUES ($1, $2) RETURNING *",
      [data.nombre, data.edad]
    );
    return res.json({
      message: `El registro de ${rows[0].nombre}, próximamente tendrás ${
        rows[0].edad + 1
      }`,
    });
  } catch (error) {
    return res.status(500).json({ message: "Internal Server Error" });
  }
};
