"use client";

import { Grid } from "@react-three/drei";

export default function NeonGrid() {
  return (
    <Grid
      position={[0, -1.55, 0]}
      args={[20, 20]}
      cellSize={0.55}
      cellThickness={0.7}
      cellColor="#165e6e"
      sectionSize={2.2}
      sectionThickness={1.15}
      sectionColor="#6d28d9"
      fadeDistance={18}
      fadeStrength={1.4}
      infiniteGrid
    />
  );
}
