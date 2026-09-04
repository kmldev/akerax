"use client";

export default function TimelineAxis({ length }: { length: number }) {
  return (
    <mesh position={[0, 0, -0.2]} rotation={[0, 0, 0]}>
      <cylinderGeometry args={[0.035, 0.035, length, 20]} />
      <meshStandardMaterial
        color="#22d3ee"
        emissive="#22d3ee"
        emissiveIntensity={1.8}
        toneMapped={false}
      />
    </mesh>
  );
}
