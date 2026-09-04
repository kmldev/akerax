# Kamal Zakoune — Portfolio 3D

Site portfolio cyberpunk en **Next.js (App Router)**, **React Three Fiber**, **Drei**, **Framer Motion** et **Tailwind CSS**.

## Stack

- Next.js 16 · React 19 · TypeScript
- three · @react-three/fiber · @react-three/drei
- framer-motion (transitions cinématiques entre sections)
- radix-ui (formulaire contact)
- react-icons

## Démarrage

```bash
npm install
npm run dev
```

Ouvrez [http://localhost:3000](http://localhost:3000).

## Architecture

```
app/                 # layout, page, styles globaux
components/          # Hero, timeline, carrousel, contact, nav
scenes/hero|timeline|projects
lib/content.ts       # données (jobs, projets, profil)
public/models        # GLTF/GLB
public/textures      # captures projets
```

## Scripts

```bash
npm run dev
npm run build
npm run start
npm run lint
```
