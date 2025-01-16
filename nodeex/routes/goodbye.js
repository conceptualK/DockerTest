// routes/goodbye.js

/**
 * @swagger
 * /api/goodbye:
 *   get:
 *     operationId: getGoodbyeMessage
 *     summary: Returns a goodbye message from the Custom API
 *     description: This endpoint returns a "Goodbye World!" message to test the API.
 *     responses:
 *       200:
 *         description: Success - The goodbye message is returned
 */
const express = require('express');
const router = express.Router();

// Define the goodbye route
router.get('/goodbye', (req, res) => {
  res.send('Goodbye World!');
});


/**
 * @swagger
 * /api/goodbye:
 *   get:
 *     operationId: getGoodbyeMessage
 *     summary: Returns a goodbye message from the Custom API
 *     description: This endpoint returns a "Goodbye World!" message to test the API.
 *     responses:
 *       200:
 *         description: Success - The goodbye message is returned
 *   post:
 *     operationId: postGoodbyeMessage
 *     summary: Returns a personalized goodbye message
 *     description: This endpoint accepts a name and returns a personalized goodbye message.
 *     requestBody:
 *       required: true
 *       content:
 *         application/json:
 *           schema:
 *             type: object
 *             properties:
 *               name:
 *                 type: string
 *                 description: Name of the person to say goodbye to
 *                 example: "John"
 *     responses:
 *       200:
 *         description: Success - The personalized goodbye message is returned
 *       400:
 *         description: Bad Request - Missing name in the request body
 */

// POST route - Accepts a name and returns a personalized goodbye message
router.post('/goodbye', (req, res) => {
  const { name } = req.body;  // Extract the 'name' field from the request body

  if (!name) {
    return res.status(400).send({ error: 'Name is required' });
  }

  res.send(`Goodbye, ${name}!`);
});

module.exports = router;
