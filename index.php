<?php
// 个人宣传页 - 海兽
// 头像文件路径（相对于当前 PHP 文件）
$avatarPath = 'tx.jpg';

// 如果头像文件不存在，使用占位图（base64 内联 SVG 避免 404）
$avatarSrc = file_exists($avatarPath) ? $avatarPath : 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 100 100\'%3E%3Crect width=\'100\' height=\'100\' fill=\'%234f2869\'/%3E%3Ccircle cx=\'50\' cy=\'40\' r=\'18\' fill=\'%23b47be0\'/%3E%3Ccircle cx=\'50\' cy=\'85\' r=\'28\' fill=\'%23b47be0\'/%3E%3C/svg%3E';

// 页面数据
$qqNumber    = '3431982860';
$nickname    = '海兽';
$selfIntro   = '欢迎加我 qq 一起玩';
$games       = ['卡拉彼丘', '三角洲行动'];
$gameIcons   = ['🎯', '🔫'];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
  <title><?= htmlspecialchars($nickname) ?> · 个人介绍</title>
  <style>
    /* ---------- 全局重置 + 基佬紫扁平风 ---------- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #2b0f3a;  /* 深紫黑底色，凸显扁平紫色块 */
      font-family: 'Inter', 'Segoe UI', 'PingFang SC', 'Roboto', system-ui, -apple-system, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.2rem;
      margin: 0;
      color: #f0e6ff;
    }

    /* 主卡片 —— 现代扁平：无阴影，大圆角，纯色块拼接 */
    .profile {
      max-width: 580px;
      width: 100%;
      background: #3e1c52;          /* 中等基佬紫 */
      border-radius: 48px;          /* 大圆角，更柔和 */
      padding: 2.8rem 2.2rem 2.4rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      border: 2px solid #a06fc9;    /* 亮紫描边，增加扁平层次 */
      transition: border-color 0.2s;
    }

    .profile:hover {
      border-color: #c79bf2;
    }

    /* 头像 – 扁平正圆，无阴影，纯色边框 */
    .avatar {
      width: 132px;
      height: 132px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid #b47be0;    /* 基佬紫点缀 */
      background-color: #4f2869;
      transition: border-color 0.2s, transform 0.15s;
      display: block;
      margin-bottom: 1.5rem;
    }

    .avatar:hover {
      border-color: #dfbaff;
      transform: scale(1.01);
    }

    /* 昵称 —— 粗体大字，高对比白 */
    .nickname {
      font-size: 2.6rem;
      font-weight: 800;
      letter-spacing: -0.02em;
      line-height: 1.1;
      color: #ffffff;
      text-shadow: 0 3px 0 #2b0f3a; /* 轻微硬阴影，扁平风也带点立体感 */
      margin-bottom: 0.25rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    /* 装饰小符号保持扁平感 */
    .nickname::after {
      content: "⚡";
      font-size: 2rem;
      color: #dbb2ff;
      filter: drop-shadow(0 2px 0 #2b0f3a);
    }

    /* QQ 徽章 —— 扁平药丸，亮紫背景 */
    .qq-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      background: #a06fc9;          /* 主紫 */
      border-radius: 60px;
      padding: 0.65rem 1.8rem;
      margin: 0.9rem 0 0.5rem;
      font-weight: 600;
      color: #ffffff;
      border: 2px solid #c79bf2;
      transition: background 0.15s, border-color 0.15s;
      font-size: 1.1rem;
      letter-spacing: 0.2px;
    }

    .qq-badge:hover {
      background: #b47be0;
      border-color: #e7d0ff;
    }

    .qq-icon {
      font-size: 1.4rem;
      line-height: 1;
      filter: drop-shadow(0 1px 0 #3e1c52);
    }

    .qq-number {
      font-family: 'SF Mono', 'JetBrains Mono', 'Fira Code', monospace;
      font-weight: 700;
      letter-spacing: 0.8px;
      background: #2b0f3a;         /* 深紫底突出数字 */
      padding: 0.25rem 1rem;
      border-radius: 60px;
      color: #e3c9ff;
      font-size: 1.1rem;
      border: 1px solid #b47be0;
    }

    /* ---------- 自我介绍 + 游戏标签 区块 ---------- */
    .intro-section {
      width: 100%;
      background: #4b2562;          /* 稍浅的紫作为区块 */
      border-radius: 36px;
      padding: 1.6rem 1.8rem;
      margin: 1.6rem 0 1.4rem;
      border: 2px solid #a06fc9;
      text-align: left;
      transition: border-color 0.2s;
    }

    .intro-section:hover {
      border-color: #c79bf2;
    }

    .intro-label {
      display: block;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-weight: 700;
      color: #dbb2ff;
      margin-bottom: 0.8rem;
      opacity: 0.9;
    }

    .intro-text {
      font-size: 1.3rem;
      font-weight: 600;
      color: #f4ecff;
      line-height: 1.5;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 6px;
    }

    .intro-text .emoji-bullet {
      font-size: 1.7rem;
      line-height: 1;
      filter: drop-shadow(0 2px 0 #2b0f3a);
    }

    /* ---------- 游戏标签专区 (扁平紫色小卡片) ---------- */
    .games-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 0.9rem;
      margin: 0.8rem 0 1.8rem;
      width: 100%;
    }

    .game-tag {
      background: #9d64d0;          /* 基佬紫亮点 */
      border-radius: 60px;
      padding: 0.7rem 1.8rem;
      font-size: 1.15rem;
      font-weight: 700;
      color: #ffffff;
      border: 2px solid #c79bf2;
      box-shadow: 0 3px 0 #2b0f3a;  /* 扁平硬阴影，模拟扁平立体感 */
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: background 0.15s, border-color 0.15s, transform 0.1s, box-shadow 0.1s;
      letter-spacing: 0.3px;
      cursor: default;
    }

    .game-tag:hover {
      background: #b47be0;
      border-color: #e7d0ff;
      transform: translateY(-2px);
      box-shadow: 0 5px 0 #2b0f3a;
    }

    .game-tag:active {
      transform: translateY(2px);
      box-shadow: 0 1px 0 #2b0f3a;
    }

    .game-icon {
      font-size: 1.35rem;
      line-height: 1;
    }

    /* 底部小字 —— 扁平点缀 */
    .footer-note {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 0.8rem;
      font-size: 0.9rem;
      font-weight: 500;
      color: #bc9fdb;
      border-top: 2px dashed #6c4390;
      padding-top: 1.5rem;
      width: 100%;
      letter-spacing: 0.3px;
    }

    .footer-note span {
      background: #2b0f3a;
      border-radius: 50px;
      padding: 0.3rem 1.2rem;
      border: 1px solid #8a5fb0;
      color: #dbb2ff;
    }

    /* 保证移动端舒服 */
    @media (max-width: 480px) {
      .profile {
        padding: 2rem 1.2rem 1.8rem;
        border-radius: 40px;
      }

      .avatar {
        width: 108px;
        height: 108px;
      }

      .nickname {
        font-size: 2.1rem;
      }

      .intro-text {
        font-size: 1.1rem;
      }

      .game-tag {
        font-size: 1rem;
        padding: 0.6rem 1.2rem;
      }

      .qq-number {
        font-size: 1rem;
      }

      .intro-section {
        padding: 1.2rem 1.2rem;
      }
    }

    /* 图片加载失败时显示占位色块 */
    .avatar {
      background: #4f2869;
    }
  </style>
</head>
<body>
  <main class="profile">
    <!-- 头像：目录下的 tx.jpg（不存在则显示占位SVG） -->
    <img class="avatar" src="<?= htmlspecialchars($avatarSrc) ?>" alt="<?= htmlspecialchars($nickname) ?>的头像">

    <!-- 昵称 -->
    <h1 class="nickname"><?= htmlspecialchars($nickname) ?></h1>

    <!-- QQ 徽章：号码 -->
    <div class="qq-badge">
      <span class="qq-icon">🐧</span>
      <span>QQ</span>
      <span class="qq-number"><?= htmlspecialchars($qqNumber) ?></span>
    </div>

    <!-- 自我介绍 + 游戏喜好 -->
    <div class="intro-section">
      <span class="intro-label">✦ 自述 ✦</span>
      <p class="intro-text">
        <span class="emoji-bullet">🌊</span>
        <?= htmlspecialchars($selfIntro) ?>
      </p>
      <!-- 游戏标签区 (扁平紫) -->
      <div class="games-container">
        <?php foreach ($games as $index => $game): ?>
          <div class="game-tag">
            <span class="game-icon"><?= $gameIcons[$index] ?? '🎮' ?></span> <?= htmlspecialchars($game) ?>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- 附带一行小字：喜欢一起玩 -->
      <p style="font-size: 1rem; margin-top: 1rem; color: #dbb2ff; font-weight: 500; display: flex; align-items: center; gap: 6px;">
        <span style="font-size: 1.3rem;">✨</span> 常驻这两款，速来开黑~
      </p>
    </div>

    <!-- 底部装饰栏（扁平硬边） -->
    <div class="footer-note">
      <span>🐧 <?= htmlspecialchars($qqNumber) ?></span>
      <span>⚡ <?= htmlspecialchars($nickname) ?></span>
      <span>🎮 <?= htmlspecialchars(implode(' / ', $games)) ?></span>
    </div>
  </main>
</body>
</html>