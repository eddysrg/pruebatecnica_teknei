import { Router } from "express";
import {
  createPersona,
  getPersonas,
} from "../controllers/users.controllers.js";

const router = Router();

router.get("/personas", getPersonas);

router.post("/persona", createPersona);

export default router;
