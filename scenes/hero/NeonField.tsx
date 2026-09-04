"use client";

import { Sparkles, Stars } from "@react-three/drei";

export default function NeonField() {
  return (
    <>
      <Stars
        radius={80}
        depth={40}
        count={1800}
        factor={3.6}
        saturation={0.4}
        fade
        speed={0.6}
      />
      <Sparkles
        count={90}
        scale={12}
        size={2.4}
        speed={0.45}
        color="#67e8f9"
        opacity={0.7}
      />
    </>
  );
}
